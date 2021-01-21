<div class="border-right bg-sidebar" id="sidebar-wrapper">
    <div class="sidebar-heading">Bun Bun</div>
    <div class="list-group list-group-flush">
        <a href="{{route('AdminIndex')}}" class="list-group-item list-group-item-action {{ (request()-> is('/admin')) ? 'bg-light' : 'bg-sidebar' }}">Dashboard</a>
        <a href="{{route('wisata.index')}}" class="list-group-item list-group-item-action {{ (request()-> is('/admin/wisata*')) ? 'bg-light' : 'bg-sidebar' }}">Kelola Wisata</a>
        <a href="{{route('AdminRating')}}" class="list-group-item list-group-item-action {{ (request()-> is('/admin/rating*')) ? 'bg-light' : 'bg-sidebar' }}">Kelola Rating</a>
        <a href="{{route('AdminKomentar')}}" class="list-group-item list-group-item-action {{ (request()-> is('/admin/komentar*')) ? 'bg-light' : 'bg-sidebar' }}">Kelola Komentar</a>
        <a href="{{route('AdminTentang')}}" class="list-group-item list-group-item-action {{ (request()-> is('/admin/tentang*')) ? 'bg-light' : 'bg-sidebar' }}">Kelola Tentang Website</a>
    </div>
</div>