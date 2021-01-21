@extends('user.layout.template')
@push('css')
<link rel="stylesheet" href="{{asset('css/navbar-top-fixed.css')}}">
@endpush
@section('content')

<!-- row bottom -->
<h2 class="mt-1 text-center">Hubungi kami</h2>

<hr class="featurette-divider">
<div class="row">

    <div class="mx-auto col-md-8">
        <label for="saran" class="mb-3">
        </label>
        <div class="card mt-2">
            <div class="card-body">
                <h3 class="card-title">Admin 1</h3>
                <hr class="featurette-divider">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><span class="fa fa-phone"></span> {{$admin1['telpon']}}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text text-success"><span class="fa fa-whatsapp"></span> {{$admin1['whatsapp']}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h3 class="card-title">Admin 2</h3>
                <hr class="featurette-divider">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><span class="fa fa-phone"></span> {{$admin2['telpon']}}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text text-success"><span class="fa fa-whatsapp"></span> {{$admin2['whatsapp']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')

@endpush