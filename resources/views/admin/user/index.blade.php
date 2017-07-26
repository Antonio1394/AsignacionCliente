@extends('admin.layouts.principal')
@section('title', 'Administrador')
@section('userMenu', 'active')

@section('styles')


@endsection

@section('content')
	<div class="row">
            <div class="col-lg-12">
    			<div class="panel panel-border panel-custom">
    				<div class="panel-heading">
    					<h3 class="panel-title">Registro de Usuarios</h3>
    				</div>
    				<div class="panel-body">

                        <table id="datatable" class="table table-striped table-bordered display responsive no-wrap"  width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Tipo Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->user }}</td>
                                        <td>{{ $value->tipo }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    				</div>
    			</div>
    		</div>
        </div>
    </div>
@endsection

@section('scripts')
	@include('templates.administrator.components.footer')

	{!! Html::script('assets/own/dist/sweetalert.min.js') !!}
	{!! Html::script('assets/plugins/moment/moment.js') !!}
    {!! Html::script('assets/pages/jquery.chat.admin.js') !!}
	{!! Html::script('assets/own/js/vue.js') !!}
	{!! Html::script('assets/own/js/vue-resource.js') !!}
	{!! Html::script('assets/own/js/chat/module_admin.js') !!}


@endsection
