<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navegación</li>
                <!-- Menu Inicio -->
                <li class="@yield('dashboardMenu', 'default')">
                    <a href="{{url('/admin')}}" class="waves-effect @yield('dashboardMenu', 'default')"><i class="ti-home"></i> <span> Inicio </span> </a>
                </li>

                <!-- Menu Usuarios -->
                <li class="@yield('dashboardMenu', 'default')">
                    <a href="{{url('/admin/user')}}" class="waves-effect @yield('userMenu', 'default')"><i class="ti-user"></i> <span> Usuarios </span> </a>
                </li>

                <!-- Menu Clientes -->
                <li class="@yield('dashboardMenu', 'default')">
                    <a href="{{url('/admin/cliente')}}" class="waves-effect @yield('userMenu', 'default')"><i class="ti-car"></i> <span> Clientes </span> </a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Left Sidebar End -->
