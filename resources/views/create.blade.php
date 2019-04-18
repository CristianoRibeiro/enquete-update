
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::open(array('route' => array('poll.store'), 'method' => 'poll', 'files' => true, 'id' => 'form-poll')) !!}
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="row form-group">
                                        {{ Form::label('Título:', '', array('class' => 'col-sm-2 col-form-label')) }}
                                        <div class="col-sm-10">
                                            {{ Form::text('title', old('title'), array('class' => ($errors->has('title')) ? 'form-control is-invalid':'form-control', 'required' )) }}
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('title') }}</strong>
		                        </span>
                                            @endif
                                        </div>

                                    </div>


                                    <div class="row form-group">
                                        {{ Form::label('Enquete 1:', '', array('class' => 'col-sm-2 col-form-label')) }}
                                        <div class="col-sm-10">

                                            <input type="text" name="enquete[]" class="{{ ($errors->has('title')) ? 'form-control is-invalid':'form-control' }}" required >
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('title') }}</strong>
		                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        {{ Form::label('Enquete 2:', '', array('class' => 'col-sm-2 col-form-label')) }}
                                        <div class="col-sm-10">

                                            <input type="text" name="enquete[]" class="{{ ($errors->has('title')) ? 'form-control is-invalid':'form-control' }}" >
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('title') }}</strong>
		                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        {{ Form::label('Enquete 3:', '', array('class' => 'col-sm-2 col-form-label')) }}
                                        <div class="col-sm-10">

                                            <input type="text" name="enquete[]" class="{{ ($errors->has('title')) ? 'form-control is-invalid':'form-control' }}" >
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('title') }}</strong>
		                        </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        {{ Form::label('Enquete 4:', '', array('class' => 'col-sm-2 col-form-label')) }}
                                        <div class="col-sm-10">

                                            <input type="text" name="enquete[]" class="{{ ($errors->has('title')) ? 'form-control is-invalid':'form-control' }}" >
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('title') }}</strong>
		                        </span>
                                            @endif
                                        </div>
                                    </div>



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
