@extends('admin.layouts.principal')
@section('title', 'Administrador')
@section('dashboardMenu', 'active')

@section('styles')


@endsection

@section('content')
	

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
