<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
<div class="form-group">
    {!! Form::label('name', 'Nombres*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'first_name', 'required' => 'required', 'placeholder' => 'Nombres']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('user', 'Email*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('user', null, ['class' => 'form-control', 'id' => 'last_name', 'required' => 'required', 'placeholder' => 'Email']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('tipo', 'Tipo Usuario*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::select('tipo',$tipo, null, ['class' => 'form-control','required' => 'required']) !!}
    </div>
</div>
