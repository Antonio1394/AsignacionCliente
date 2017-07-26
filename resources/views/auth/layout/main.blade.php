@include('templates.login.components.head')
<body>

@include('templates.administrator.components.alertErrors')
@include('templates.administrator.components.alertSuccess')
@yield('content')

@include('templates.login.components.scripts')
</body>
</html>