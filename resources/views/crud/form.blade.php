<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <input class="form-control" name="name" type="hidden" disabled="" id="name" value="{{ isset($dicas->name) ? $dicas->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo*: ' }}</label>
        <select name="tipo" id="tipo">
            @foreach($dicas->tiposVeiculo as $item)
                
                @if ($dicas->id_tpv == $item->id_tpv)
                    <option value="{{$item->id_tpv}}" selected>{{$item->tipo}}</option>
                @else
                    <option value="{{$item->id_tpv}}" >{{$item->tipo}}</option>
                @endif

            @endforeach
        </select>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
    <label for="marca" class="control-label">{{ 'Marca*: ' }}</label>
    <input class="form-control" name="marca" type="text" id="marca" value="{{ isset($dicas->marca) ? $dicas->marca : ''}}" required>
    {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
    <label for="modelo" class="control-label">{{ 'Modelo*:' }}</label>
    <input class="form-control" name="modelo" type="text" id="modelo" value="{{ isset($dicas->modelo) ? $dicas->modelo : ''}}" required>
    {!! $errors->first('modelo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('versao') ? 'has-error' : ''}}">
    <label for="versao" class="control-label">{{ 'Versão:' }}</label>
    <input class="form-control" name="versao" type="text" id="versao" value="{{ isset($dicas->versao) ? $dicas->versao : ''}}" >
    {!! $errors->first('versao', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dica') ? 'has-error' : ''}}">
    <label for="dica" class="control-label">{{ 'Dica*:' }}</label>
    <textarea class="form-control" rows="5" name="dica" type="textarea" id="dica" required>{{ isset($dicas->dica) ? $dicas->dica : ''}}</textarea>
    {!! $errors->first('dica', '<p class="help-block">:message</p>') !!}
</div>
