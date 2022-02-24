<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <input class="form-control" name="name" type="hidden" disabled="" id="name" value="{{ isset($dica->name) ? $dica->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo*: ' }}</label>
        <select name="tipo" id="tipo">
            @foreach($dica->autoTypes as $item)
                
                @if ($dica->id_auto_tp == $item->id_auto_tp)
                    <option value="{{$item->id_auto_tp}}" selected>{{$item->tipo}}</option>
                @else
                    <option value="{{$item->id_auto_tp}}" >{{$item->tipo}}</option>
                @endif

            @endforeach
        </select>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
    <label for="marca" class="control-label">{{ 'Marca*: ' }}</label>
    <input class="form-control" name="marca" type="text" id="marca" value="{{ isset($dica->marca) ? $dica->marca : ''}}" required>
    {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
    <label for="modelo" class="control-label">{{ 'Modelo*:' }}</label>
    <input class="form-control" name="modelo" type="text" id="modelo" value="{{ isset($dica->modelo) ? $dica->modelo : ''}}" required>
    {!! $errors->first('modelo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('versao') ? 'has-error' : ''}}">
    <label for="versao" class="control-label">{{ 'Versão:' }}</label>
    <input class="form-control" name="versao" type="text" id="versao" value="{{ isset($dica->versao) ? $dica->versao : ''}}" >
    {!! $errors->first('versao', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dica') ? 'has-error' : ''}}">
    <label for="dica" class="control-label">{{ 'Dica*:' }}</label>
    <textarea class="form-control" rows="5" name="dica" type="textarea" id="dica" required>{{ isset($dica->dica) ? $dica->dica : ''}}</textarea>
    {!! $errors->first('dica', '<p class="help-block">:message</p>') !!}
</div>
