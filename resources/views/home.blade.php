@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Home</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="procurar">
                            <div class="input-group">
                                <input type="text" class="form-control" name="procurar" placeholder="procurar..." value="{{ request('procurar') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Usuário</th><th>Modelo</th><th>Dica</th><th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dicas as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->modelo }}</td>
                                            <td>{{ $item->dica }}</td>
                                            <td>
                                                <a href="{{ url('/admin/posts/show/' . $item->id_dica) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Detalhes</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $dicas->appends(['procurar' => Request::get('procurar')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
