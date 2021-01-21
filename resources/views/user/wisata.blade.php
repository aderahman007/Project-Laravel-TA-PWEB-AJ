@extends('user.layout.template')
@push('css')
<link rel="stylesheet" href="{{asset('css/navbar-top-fixed.css')}}">
@endpush
@section('content')
<!-- row bottom -->
<h2 class="mt-1 text-center">Daftar Obyek Wisata</h2>
<div class="col-md-6 mx-auto">
    <p class="text-center">Occaecat duis do Lorem cupidatat ullamco veniam.Est voluptate aliqua est amet nostrud laborum et
        in officia Lorem adipisicing.</p>
</div>
<hr class="featurette-divider">
<div class="row mb-5">
    @foreach($wisata as $d)
    <div class="col-md-3">
        <div class="card mb-4 shadow-sm">
            <img height="176" class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap" src="{{asset('image_upload/' . $d->foto)}}">
            <div class="card-body">
                <h5 class="card-text">{{$d->wisata}}</h5>
                <p>{{$d->descripsi}}</p>
                <div class="d-flex justify-content-start align-items-center mt-3">
                    <a href="{{route('wisata.show', $d->id)}}" class="btn btn-sm btn-light" style="background-color: #e3f2fd;">Lihat selengkapnya...</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <hr>
    {{$wisata->links()}}
</div>

@endsection
@push('js')

@endpush