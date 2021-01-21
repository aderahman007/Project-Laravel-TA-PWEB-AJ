<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        return view('user.dashboard', ['data' => $data, 'galeri_top' => $galeri_top]);
    }

    public function wisata(){
        $wisata = Wisata::simplePaginate(10);
        return view('user.wisata', ['wisata' => $wisata]);
    }
    
    public function tentang(){
        $item = [
            'foto' => 'https://indonesia.tripcanvas.co/id/wp-content/uploads/sites/2/2017/09/1b-1-by-fomitar-740x554.jpg',
            'descripsi' => 'Kebun ini yang dijadikan tempat wisata bukanlah kebuan biasa yang dibenuhi dengan bunga atau buah buahan. Kebun ini memiliki beberapa fasilitas yang membuat liburan semakin menyenangkan. Anda bisa berenang, memacing, menikmati kudapan lezat hingga menginap. Wisata Kebun berada di Malino Kabupaten Gowa yang memiliki udara yang sejuk. 90 Km dari Makassar menjadikan tempat ini sebagai alternatif liburan yang seru. 
            Pengunjungnya memang kebanyakan warha lokal namun pendatang juga tak kalah banyak yang mengunjungi tempat ini. Alamnya yang masih alami dengan udara yang bersih memang menjadi daya tarik tersendiri untuk menghabiskan waktu liburan. Berbagai aktivitas menarik juga bisa dilakukan untuk dijadikan kenang kenangan. Apalagi jika menghabiskan waktu bersama dengan keluarga atau sahabat.
            Memang di Kebun ini Anda juga bisa menemui tanaman buah buah yang ditunjang dengan fasilitas lengkap. Pohon yang ditanam mulai dari rambutan, durian, mangga hingga jeruk serta tanaman lainnya. Tak hanya buah tanaman hias juga turut hadir agar membuat tampilan tempat ini semakin cantik. Udaranya yang sejuk dengan pepohonan rindang bisa dipastikan akan membuat Anda betah dan ingin berlama lama di ojek wisata kebun ini'
        ];

        return view('user.tentang', ['tentang' => $item]);
    }
    
    public function hubungi_kami(){
        $admin1 = [
            'telpon' => '+6281255678896',
            'whatsapp' => '+6281256679212',
        ];
        $admin2 = [
            'telpon' => '+6289234537800',
            'whatsapp' => '+6285578541355',
        ];
        return view('user.hubungi_kami', ['admin1' => $admin1, 'admin2' => $admin2]);
    }
    
    public function detail_wisata($id){
        return view('user.detail_wisata');
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
}
