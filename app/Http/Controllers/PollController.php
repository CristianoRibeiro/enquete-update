<?php

namespace App\Http\Controllers;

use App\Option;
use App\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $option = new Option();
//        $poll = new Poll();
//        $dd = $poll->options;
        $dd = $option->poll;
//        dd($dd);
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Poll $poll)
    {



        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  Poll $pollDB)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $options = $request['enquete'];
//        dd($options);
        $input = $request->except(['_token', 'enquete']);

        $poll = $pollDB->create($input);
//        dd($poll_insert);
        $item = [];
        foreach ($options as $option) {
            $item[] = new Option(['poll_id'=>$poll->id,'title' => $option]);
        }
//        dd($item);
        $poll->options()->saveMany($item);

//      dd($poll_insert->options);

        if($poll){
            return view('edit',compact('poll'))
                ->with(['status.message' => 'Inserido com sucesso!', 'status.type' => 'success']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poll = Poll::find($id);
        $page_title = 'Editar enqutete';
        return view('edit', compact('poll', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $poll = Poll::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',

        ])
            ->setAttributeNames(['title' => 'título']);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $options = $request['enquete'];
        $optionsIds = $request['ids'];

        $input = $request->except(['_token', 'enquete']);


        $optionsModel = [];
        foreach ($options as $key=> $option) {

            if ($option) {
                $optionDB = Option::findOrFail($optionsIds[$key]);
                $optionsModel[] = new Option(['title' => $option]);
                $optionDB->update(['title' => $option]);

            }

        }


        $poll_options = $poll->update($input);


        if($poll_options){
            return view('edit', compact('poll'))
                ->with(['status.message' => 'Inserido com sucesso!', 'status.type' => 'success']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
