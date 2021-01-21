@extends('admin.layout.template')
@push('css')

@endpush
@section('content')

<h2 class="text-center mt-4">{{$wisata->wisata}}</h2>
<hr class="featurette-divider">
<img class="my-3 mx-auto d-block" src="{{asset('image_upload/' . $wisata->foto)}}" alt="" height="300">
<p class="text-justify">{{$wisata->descripsi}}</p>

<p><span class="fa fa-map-marker"></span> {{$wisata->lokasi}}</p>

<div class="col-md-12 card mx-auto p-2">
    <div class="col-md-12">
        <div class="mx-auto">
            <!-- <span class="field-label-header">Rating</span> -->
            <form action="{{request()->segment(3)}}/rating" method="post">
                {{csrf_field()}}
                <h4 class="text-primary text-center">Total Rating <?= (int)(($show_rating == null) ? 0 : $show_rating) ?> /5</h4>
                <div class="form-group" id="rating-ability-wrapper">
                    <label for="rating" class="control-label">
                        <span class="field-label-info"></span>
                        <input type="hidden" name="selected_rating" id="selected_rating" value="" required="required">
                    </label>
                    <h2 class="bold rating-header">
                        <span class="selected-rating">0</span><small> / 5</small>
                    </h2>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                </div>

                <button type="submit" class="btn btn-primary submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <div class="mx-auto">
            <h4 class="text-primary text-center">Komentar</h4>
            <div class="col-md-12 mt-5">
                @foreach($komentar as $k)
                <!-- <img src="gambar4.jpg" class="mr-3" alt="..." style="width: 100px"> -->
                <div class="card p-3 media-body">
                    <h5 class="mt-0">{{$k->nama}}</h5>
                    <!-- <p class="text-success"><a href="#">Reply</a></p> -->
                    {{$k->komentar}}
                    <small>
                        <p class="text-success">{{$k->updated_at}}</p>
                    </small>
                </div>
                <hr>
                @endforeach
                {{$komentar->links()}}
                <hr>
            </div>
            <form class="mt-5" action="{{request()->segment(3)}}/komentar" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama">
                </div>

                <div class="form-group">
                    <label for="komentar">Komentar</label>
                    <textarea class="form-control komentar" id="komentar" name="komentar" rows="3" placeholder="Komentar anda"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    jQuery(document).ready(function($) {
        $(".btnrating").on('click', (function(e) {

            var previous_value = $("#selected_rating").val();

            var selected_value = $(this).attr("data-attr");
            $("#selected_rating").val(selected_value);

            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);

            for (i = 1; i <= selected_value; ++i) {
                $("#rating-star-" + i).toggleClass('btn-warning');
                $("#rating-star-" + i).toggleClass('btn-default');
            }
            for (ix = 1; ix <= previous_value; ++ix) {
                $("#rating-star-" + ix).toggleClass('btn-warning');
                $("#rating-star-" + ix).toggleClass('btn-default');
            }

        }));
    });
    /*
        $('.submit').on('click', function() {

            var rating = $('#selected_rating').val();
            $('.selected-rating').attr('value', rating);

        })
    */
</script>

@endpush