@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<!-- row bottom -->
<h2 class="mt-1 text-center mt-4">Tentang kami</h2>

<img class="my-3 mx-auto d-block" src="{{$tentang['foto']}}" alt="" height="300" width="600">
<p class="text-justify">{{$tentang['descripsi']}}</p>

@endsection
@push('js')

@endpush