
@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')

    <header class="bg-primary text-white">
        <div class="container text-center">
            <h1>Cadastro Enquete</h1>
        </div>
    </header>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <a href="{{url('poll')}}" class="btn btn-dark  mb-5 "> < Voltar </a>

                    {!! Form::model($poll, array('route' => array('poll.update', $poll->id), 'method' => 'poll', 'files' => true, 'id' => 'form-poll')) !!}
                    {{ method_field('PATCH') }}
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row form-group">
                                        {{ Form::label('Título:', '', array('class' => 'col-sm-2 col-form-label')) }}
                                        <div class="col-sm-10">
                                            {{ Form::text('title', old('title'), array('class' => ($errors->has('title')) ? 'form-control is-invalid':'form-control' )) }}
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('title') }}</strong>
		                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    @foreach($poll->options as $key => $option)
                                        <div class="row form-group">
                                            {{ Form::label('Enquete:', '', array('class' => 'col-sm-2 col-form-label')) }}
                                            <div class="col-sm-10">
                                                <input type="text" name="enquete[{{$key}}]" value="{{$option->title}}" class="form-control" >
                                                <input type="hidden" name="ids[{{$key}}]" value="{{$option->id}}" class="form-control" >


                                                @if ($errors->has('enquete'))
                                                    <span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('title') }}</strong>
									</span>
                                                @endif
                                            </div>

                                        </div>


                                    @endforeach




                                    <div class="row form-group">
                                        {{ Form::label('Data Inicial:', '', array('class' => 'col-sm-2 col-form-label')) }}
                                        <div class="col-sm-3">
                                            {{ Form::date('start_date', \Carbon\Carbon::now(), array('class' => ($errors->has('start_date')) ? 'form-control is-invalid':'form-control', 'type' => 'date' )) }}
                                            @if ($errors->has('start_date'))
                                                <span class="invalid-feedback" role="alert">
					                <strong>{{ $errors->first('start_date') }}</strong>
					            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="row form-group">
                                        {{ Form::label('Data Final:', '', array('class' => 'col-sm-2 col-form-label')) }}
                                        <div class="col-sm-3">
                                            {{ Form::date('end_date', \Carbon\Carbon::now()->addDays(1), array('class' => ($errors->has('end_date')) ? 'form-control is-invalid':'form-control', 'type' => 'date' )) }}
                                            @if ($errors->has('end_date'))
                                                <span class="invalid-feedback" role="alert">
					                <strong>{{ $errors->first('end_date') }}</strong>
					            </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card-footer bg-white">
                            <button type="submit" class="btn btn-primary upload-result">Salvar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>

@endsection
