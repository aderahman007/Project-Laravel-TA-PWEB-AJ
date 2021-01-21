<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('wisata')->select('id', 'wisata', 'descripsi', 'foto')->limit(10)->latest()->get();
        $galeri_top = DB::table('wisata')->select('id', 'wisata', 'descripsi', 'foto')->limit(4)->latest()->get();
        return view('admin.dashboard', ['data' => $data, 'galeri_top' => $galeri_top]);
    }

    public function rating(Request $request)
    {
        if ($request->input('selected_rating') == null) {
            # code...
            return redirect('admin/wisata/' . request()->segment(3));
        } else {
            $item = [
                'id_wisata' => request()->segment(3),
                'rating' => $request->input('selected_rating'),
            ];
        }
        // dd($item);
        Rating::create($item);
        return redirect('admin/wisata/' . request()->segment(3));
    }

    public function show_rating(){
        $count_rating = DB::table('rating')
                        ->join('wisata', 'wisata.id', '=', 'rating.id_wisata')
                        // ->where('wisata.id', '=', 'rating.id_wisata')
                        ->select('wisata.wisata as wisata', 'wisata.id as id_rating', DB::raw('avg(rating.rating) as rating', 'rating.id as id_rating'))
                        ->groupBy('id_wisata')
                        ->simplePaginate(10);
        // dd($count_rating);
        return view('admin.rating', ['rating'=> $count_rating]);
    }

    public function hapus_rating($id){
        // $data = Rating::findOrFail($id);
        
        // $data->delete();
        DB::table('rating')->where('id_wisata', '=', $id)->delete();

        Session::flash('success', 'Wisata berhasil dihapus');
        return redirect()->route('AdminRating');
    }

    public function komentar(Request $request)
    {
        $item = [
            'id_wisata' => request()->segment(3),
            // 'parent_id' => '',
            'nama' => $request->input('nama'),
            'komentar' => $request->input('komentar'),
        ];
        // dd($item);
        Komentar::create($item);
        return redirect('admin/wisata/' . request()->segment(3));
    }

    public function show_komentar(){
        $komentar = DB::table('komentar')
                    ->join('wisata', 'wisata.id', '=', 'komentar.id_wisata')
                    ->select('komentar.*', 'wisata.wisata')
                    ->simplePaginate(10);

        return view('admin.komentar', ['komentar' => $komentar]);
    }

    public function hapus_komentar($id){
        $data = Komentar::findOrFail($id);
        
        $data->delete();
    }

    public function tentang(){
        $item = [
            'foto' => 'https://indonesia.tripcanvas.co/id/wp-content/uploads/sites/2/2017/09/1b-1-by-fomitar-740x554.jpg',
            'descripsi' => 'Kebun ini yang dijadikan tempat wisata bukanlah kebuan biasa yang dibenuhi dengan bunga atau buah buahan. Kebun ini memiliki beberapa fasilitas yang membuat liburan semakin menyenangkan. Anda bisa berenang, memacing, menikmati kudapan lezat hingga menginap. Wisata Kebun berada di Malino Kabupaten Gowa yang memiliki udara yang sejuk. 90 Km dari Makassar menjadikan tempat ini sebagai alternatif liburan yang seru. 
            Pengunjungnya memang kebanyakan warha lokal namun pendatang juga tak kalah banyak yang mengunjungi tempat ini. Alamnya yang masih alami dengan udara yang bersih memang menjadi daya tarik tersendiri untuk menghabiskan waktu liburan. Berbagai aktivitas menarik juga bisa dilakukan untuk dijadikan kenang kenangan. Apalagi jika menghabiskan waktu bersama dengan keluarga atau sahabat.
            Memang di Kebun ini Anda juga bisa menemui tanaman buah buah yang ditunjang dengan fasilitas lengkap. Pohon yang ditanam mulai dari rambutan, durian, mangga hingga jeruk serta tanaman lainnya. Tak hanya buah tanaman hias juga turut hadir agar membuat tampilan tempat ini semakin cantik. Udaranya yang sejuk dengan pepohonan rindang bisa dipastikan akan membuat Anda betah dan ingin berlama lama di ojek wisata kebun ini'
        ];

        return view('admin.tentang', ['tentang' => $item]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function form_login(){
        if (Auth::user()) {
            Session::flash('success', 'Selamat anda berhasil login');
            return redirect()->route('AdminIndex');
        }
        return view('admin.login');
    }

    public function login(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        Auth::attempt($data);
        if (Auth::check()) {
            Session::flash('success', 'Selamat anda berhasil login');
            return redirect()->route('AdminIndex');
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('success', 'Anda telah Logout');
        return redirect()->route('login');
    }
}
