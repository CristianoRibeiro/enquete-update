@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')

<header class="bg-primary text-white">
    <div class="container text-center">
        <h1>Titulo da Enquete</h1>
    </div>
</header>

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <a href="{{url('poll/create')}}" class="btn btn-success  mb-5 "> + Novo</a>

                {{ Form::open(array('url' => '/poll')) }}

                <div class="pretty p-default p-round">
                    <input type="radio" name="enquete[]" />
                    <div class="state">
                        <label>Enquete 01</label>
                    </div>
                </div>
                <br><br>

                <div class="pretty p-default p-round">
                    <input type="radio" name="enquete[]" />
                    <div class="state">
                        <label>Enquete 02</label>
                    </div>
                </div>

                {{ Form::close() }}

            </div>
        </div>
    </div>
</section>


@endsection