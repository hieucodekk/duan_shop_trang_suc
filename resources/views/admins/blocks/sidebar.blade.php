<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <div class="logo-box">
                <a class='logo logo-light' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a class='logo logo-dark' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>
                    <li>
                        <a class='tp-link' href='{{route('admins.listuser')}}'>
                            <i data-feather="users"></i>
                            <span> Users </span>
                        </a>
                     </li>
               
             
                <li class="menu-title">Pages</li>
                <li>
                    <a class='tp-link' href='{{route('admins.danhmucs.index')}}'>
                        <i data-feather="package"></i>
                        <span> Category </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href='{{route('admins.sanphams.index')}}'>
                        <i data-feather="align-center"></i>
                        <span> Product </span>
                    </a>
                </li>  
                <li>
                    <a class='tp-link' href='{{route('admins.donhang1s.index')}}'>
                        <i data-feather="shopping-bag"></i>
                        <span> Don hang </span>
                    </a>
                </li>              
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
