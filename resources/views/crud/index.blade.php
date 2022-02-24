@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Minhas Dicas</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/posts/create') }}" class="btn btn-success btn-sm" title="Criar Dica">
                            <i class="fa fa-plus" aria-hidden="true"></i> Novo
                        </a>

                        <form method="GET" action="{{ url('/me') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="procurar">
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
                                                <a href="{{ url('/admin/posts/edit/' . $item->id_dica) }}" title="editar"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                                <form method="POST" action="{{ url('/admin/posts/destroy/' . $item->id_dica) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                                                </form>
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
