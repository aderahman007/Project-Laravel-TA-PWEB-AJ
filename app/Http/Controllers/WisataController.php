<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Rating;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::simplePaginate(10);
        return view('admin.wisata', ['wisata' => $wisata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('foto');
        $filename = time() . "_" . $image->getClientOriginalName();
        $address = 'image_upload';
        $image->move($address, $filename);

        $item = [
            'wisata' => $request->input('wisata'),
            'descripsi' => $request->input('descripsi'),
            'lokasi' => $request->input('lokasi'),
            'foto' => $filename,
        ];

        //dd($item);
        Wisata::create($item);

        Session::flash('success', 'Wisata berhasil ditambah');
        return redirect()->route('wisata.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);
        $komentar = DB::table('komentar')
        ->join('wisata', 'wisata.id', '=', 'komentar.id_wisata')
        ->where('komentar.id_wisata', '=', $id)
            ->simplePaginate(3);
        $show_rating = DB::table('rating')
            ->join('wisata', 'wisata.id', '=', 'rating.id_wisata')
            ->where('rating.id_wisata', '=', $id)
            ->avg('rating');
        // dd($wisata);
        return view('admin.detail_wisata', ['wisata' => $wisata, 'show_rating' => $show_rating, 'komentar' => $komentar]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Wisata::findOrFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Wisata::findOrFail($id);

        $filename = $data->foto;
        if ($request->hasFile('foto')) {
            $image_path = public_path() . '/image_upload/' . $filename;
            if (file_exists($image_path))
                File::delete($image_path);
            $image = $request->file('foto');
            $filename = time() . "_" . $image->getClientOriginalName();
            $address = 'image_upload';
            $image->move($address, $filename);
        }

        $data->wisata = $request->wisata;
        $data->foto = $filename;
        $data->descripsi = $request->descripsi;
        $data->lokasi = $request->lokasi;
        // dd($data);
        $data->update();

        Session::flash('success', 'Wisata berhasil diubah');
        return redirect()->route('wisata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wisata::findOrFail($id);
        $filename = $data->foto;
        $image_path = public_path() . '/image_upload/' . $filename;
        if (file_exists($image_path))
            File::delete($image_path);
        $data->delete();

        Session::flash('success', 'Wisata berhasil dihapus');
        return redirect()->route('wisata.index');
    }
}
