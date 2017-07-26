{!!Form::open(['route' => ['admin.user.destroy', $id], 'method' => 'DELETE'])!!}
    <h4>
        ¿Desea eliminar este Registro?
    </h4>
    <div class="modal-footer">
        {!! Form::submit('Si', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">No</button>
    </div>
{!!Form::close()!!}

<script type="text/javascript">
    $('#modal-maintenances form').submit(function(e){
        $("#modal-maintenances .waves-light").prop('disabled', true);
    });
</script>
