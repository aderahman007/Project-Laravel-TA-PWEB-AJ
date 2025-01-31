<nav class="navbar navbar-expand-lg navbar-light bg-sidebar fixed-top">
    <a class="navbar-brand" href="{{ (request()-> is('/')) ? 'active' : '' }}">Bun Bun</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a href="{{route('FormLogin')}}" class="btn btn-sm btn-primary" title="Anda admin? Silahkan login disini!">Login</a>
        </span>
    </div>
</nav>