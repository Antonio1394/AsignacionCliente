@extends('admin.layouts.principal')

@section('title', 'Administrador')

@section('asignacionMenu', 'active')

@section('styles')
    {!! Html::style('assets/own/dist/dataTables.bootstrap.min.css') !!}
    {!! Html::style('assets/own/dist/responsive.bootstrap.min.css') !!}
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-12">
    			<div class="panel panel-border panel-custom">
    				<div class="panel-heading">
    					<h3 class="panel-title">Listado de Clientes</h3>
    				</div>
    				<div class="panel-body">
                    <table id="tableData" class="table table-striped table-bordered display responsive no-wrap"  width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>




                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cliente as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->nombre }} {{ $value->Apellido }}</td>
                                        <td>{{ $value->direccion }}</td>
                                        <td>{{ $value->telefono }}</td>
                                        @if($value->asignado==0)
                                          <td style="color:red">No Asignado</td>
                                          <td class="text-center">
                                              <button class="btn btn-info waves-effect waves-light loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/asignacion/crear/{{ $value->id }}" data-title="Asignar Vendedor">
                                                <i class="fa fa-plus m-r-5"></i>
                                              </button>
                                          </td>
                                        @else
                                          <td  style="color:blue">Asignado</td>
                                          <td class="text-center">
                                              <button class="btn btn-success waves-effect waves-light loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/asignacion/actualizar/{{ $value->id }}" data-title="Asignar Vendedor">
                                                <i class="fa fa-wrench"></i>
                                              </button>
                                          </td>

                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
    				</div>
    			</div>
    		</div>
        </div>
    </div>
    @include('templates.administrator.components.modal')
@endsection

@section('scripts')
    @include('templates.administrator.components.footer')
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.js') !!}
    {!! Html::script('assets/own/dist/dataTables.responsive.min.js') !!}
    {!! Html::script('assets/own/dist/responsive.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/parsleyjs/dist/parsley.min.js') !!}


    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableData').DataTable( {
                language: {
                    url: '/assets/own/json/spanish.json'
                }
            } );
        } );
    </script>
@endsection
