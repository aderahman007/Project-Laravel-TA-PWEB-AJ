@extends('admin.layout.template')
@push('css')

@endpush
@section('content')

<div class="row mt-4">
    <div class="col-md-6">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($data as $d => $slider)
                <div class="carousel-item {{$d == 0 ? 'active' : ''}}">
                    <img height="380" class="d-block w-100 cs" src="{{asset('image_upload/' . $slider->foto)}}" alt="First slide">
                </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- end carousel -->
    <div class="col-md-6">
        <div class="row">
            @foreach($galeri_top as $g)
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <img height="176" class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap" src="{{asset('image_upload/' . $g->foto)}}">

                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- row bottom -->
<h2 class="mt-5 text-center">Wisata Populer</h2>
<div class="col-md-6 mx-auto mb-4">
    <p class="text-center">Kunjungi tempat wisata populer dan dapatkan info menarik lain nya serta info destinasi wisata terbaru</p>
</div>
<div class="row">
    @foreach($data as $d)
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
    
</div>

@endsection
@push('js')

@endpush