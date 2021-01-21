@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<h1 class="mt-4">Rating</h1>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    Data Rating
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Wisata</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($rating as $w)
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td>{{$w->wisata}}</td>
                            <td>{{(int)$w->rating}}</td>
                            <td>
                                <div class="row">
                                    <a class="btn btn-sm btn-outline-info mr-lg-2 mb-lg-2 detail" href="{{route('wisata.show', $w->id_rating)}}">Tambah</a>
                                    <form action="{{route('rating.destroy', $w->id_rating)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{$rating->links()}}
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: "{{Session::get('success')}}",
        });

    }
</script>


@endpush