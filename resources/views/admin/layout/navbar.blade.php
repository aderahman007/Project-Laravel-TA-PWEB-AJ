<nav class="navbar navbar-expand-lg navbar-light border-bottom bg-sidebar">
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="menu-toggle" type="button"><span class="navbar-toggler-icon"></span></button>
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item {{ (request()-> is('/')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('UserIndex')}}">Beranda</span></a>
            </li>
            <li class="nav-item {{ (request()-> is('wisata*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('UserWisata')}}">Wisata</a>
            </li>
            <li class="nav-item {{ (request()-> is('tentang*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('UserTentang')}}">Tentang</a>
            </li>
            <li class="nav-item {{ (request()-> is('hubungi_kami*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('UserHubungiKami')}}">Hubungi Kami</a>
            </li>

        </ul>
        <span class="navbar-right">
            <a class="btn btn-sm btn-danger" href="{{route('logout')}}">Logout</a>
        </span>
    </div>
</nav>