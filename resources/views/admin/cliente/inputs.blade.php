<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

<div class="form-group">
    {!! Form::label('nombre', 'Nombre*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'first_name', 'required' => 'required', 'placeholder' => 'Nombres', "data-parsley-required-message" => "Escriba los nombres"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('apellido', 'Apellido*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('apellido', null, ['class' => 'form-control', 'id' => 'first_name', 'required' => 'required', 'placeholder' => 'Apellidos', "data-parsley-required-message" => "Escriba los nombres"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Dirección*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('direccion', null, ['class' => 'form-control', 'id' => 'last_name', 'required' => 'required', 'placeholder' => 'Direccion', "data-parsley-required-message" => "Escriba los apellidos"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('telefono', 'Teléfono*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::number('telefono',null, ['class' => 'form-control', 'id' => 'address', 'required' => 'required', 'placeholder' => 'Teléfono', "data-parsley-required-message" => "Escriba la dirección"]) !!}
    </div>
</div>



