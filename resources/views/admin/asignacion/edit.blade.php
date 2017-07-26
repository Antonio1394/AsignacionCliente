{!! Form::model($dataEdit, ['route' => ['admin.asignacion.update', $dataEdit->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'editForm', 'data-parsley-validate' => '', 'files' => true]) !!}
    <input type="hidden" name="id" id="id" value="{{ $dataEdit->id }}">
    @include('admin.asignacion.inputs')
    <div class="modal-footer">
        {!! Form::submit('Editar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
    </div>
{!! Form::close() !!}
