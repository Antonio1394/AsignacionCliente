<div class="form-group">
    {!! Form::label('idUsuario', 'Seleccione un Vendedor', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::select('idUsuario',$user, null, ['class' => 'form-control','required' => 'required']) !!}
    </div>
    <input type="hidden" name="idCliente" value={{$id}}><!--Valor del cliente seleccionado-->
</div>
