@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Editar Dica #{{ $data->id_dica }}</div>
                    <div class="card-body">
                        <a href="{{ url('/') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ url('/admin/posts/update/' . $data->id_dica) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
                                <label for="marca" class="control-label">{{ 'Marca*: ' }}</label>
                                <select name="marca" disabled="" id="marca">
                                    <option>{{$data->marca}}</option>
                                </select>
                                {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
                                <label for="modelo" class="control-label">{{ 'Modelo*: ' }}</label>
                                <select name="modelo" disabled="" id="modelo" onclick="buscaTipo(this.value)">
                                    <option>{{$data->modelo}}</option>
                                </select>
                                {!! $errors->first('modelo', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
                                <label for="tipo" class="control-label">{{ 'Tipo*: ' }}</label>
                                <input class="form-control" name="tipo" disabled="" id="tipo" value="{{ isset($data->tipo) ? $data->tipo : ''}}">
                                {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('versao') ? 'has-error' : ''}}">
                                <label for="versao" class="control-label">{{ 'Versão:' }}</label>
                                <input class="form-control"  name="versao" type="text" id="versao" value="{{ isset($data->versao) ? $data->versao : ''}}" >
                                {!! $errors->first('versao', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('dica') ? 'has-error' : ''}}">
                                <label for="dica" class="control-label">{{ 'Dica*:' }}</label>
                                <textarea class="form-control"  rows="5" name="dica" type="textarea" id="dica" required>{{ isset($data->dica) ? $data->dica : ''}}</textarea>
                                {!! $errors->first('dica', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value='Atualizar'>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
