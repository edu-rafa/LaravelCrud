<div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
    <label for="marca" class="control-label">{{ 'Marca*: ' }}</label>
    <select name="marca" id="marca" onchange="buscaModelos(this.value)">
        @foreach($data as $item)
            <option value="{{$item->id_marca}}" >{{$item->marca}}</option>
        @endforeach
    </select>
    {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
    <label for="modelo" class="control-label">{{ 'Modelo*: ' }}</label>
    <select name="modelo" id="modelo" onclick="buscaTipo(this.value)">
    <option>INDEFINIDO</option>
    </select>
    {!! $errors->first('modelo', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
<label for="tipo" class="control-label">{{ 'Tipo*: ' }}</label>
    <input class="form-control" name="tipo" disabled="" id="tipo" value=''>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('versao') ? 'has-error' : ''}}">
    <label for="versao" class="control-label">{{ 'Versão:' }}</label>
    <input class="form-control" name="versao" type="text" id="versao" value="{{ isset($data->versao) ? $data->versao : ''}}" >
    {!! $errors->first('versao', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dica') ? 'has-error' : ''}}">
    <label for="dica" class="control-label">{{ 'Dica*:' }}</label>
    <textarea class="form-control" rows="5" name="dica" type="textarea" id="dica" required>{{ isset($data->dica) ? $data->dica : ''}}</textarea>
    {!! $errors->first('dica', '<p class="help-block">:message</p>') !!}
</div>

<script type="text/javascript">
    function buscaModelos(e) {
       
        var selectMarca = document.getElementById('marca');
        var selectModelo = document.getElementById('modelo');
        selectModelo.options.length = 0; 
	    var value = selectMarca.options[selectMarca.selectedIndex].value;

        $.ajax({
            type: "GET",
            url: "/ajaxmarcas/"+value,
            success: function(data) {
                var arrayJson = JSON.parse(data)
                arrayJson.forEach(opt => {
                    selectModelo.appendChild(new Option(opt.modelo, opt.id_modelo))
                });
            }

        });

    }

    function buscaTipo(e) {
       var selectModelo = document.getElementById('modelo');
       var value = selectModelo.options[selectModelo.selectedIndex].value;

       $.ajax({
           type: "GET",
           url: "/ajaxmodelo/"+value,
           success: function(data) {
               var arrayJson = JSON.parse(data)
               document.getElementById('tipo').value =arrayJson.tipo;
           }

       });

   }


</script>
