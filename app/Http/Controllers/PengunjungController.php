<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Session;
use Illuminate\Support\Carbon;
use App\Models\Wisata;
use App\Models\Tiket;
use App\Models\Bukti;
use App\Models\Profile;

class PengunjungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wisata= Wisata :: paginate(2);
        $wisata1= Wisata ::orderBy("id", "desc")->get();
        $user = Auth::user();
        return view('Pengunjung.home', compact( 'user','wisata','wisata1'));
    }
    public function wisata_terpilih($id){
        $user = Auth::user();
        $wisata= Wisata :: where('id',$id)->get();
        return view('Pengunjung.wisata_terpilih', compact( 'user','wisata'));
    }
    public function profile(){
        $user = Auth::user();
        return view('Pengunjung.profile', compact('user'));
    }

    public function profile_edit(){
        $user = Auth::user();
        return view('Pengunjung.profile_edit', compact('user'));
    }

    public function profile_update(Request $req){
        $validate = $req->validate([
            'alamat'=> 'required|max:255',
            'tempat_lahir'=> 'required',
            'tanggal_lahir'=> 'required',
            'no_tlp'=> 'required',
            'jenis_kelamin' => 'required',
            'nama' => 'required'
        ]);
        $user = Auth::user();
        $profile = Profile::where('users_id', $user->id)->first();
        if(!$user){
            $profile->update([
                'alamat' => $req->alamat,
                'tempat_lahir' => $req->tempat_lahir,
                'tanggal_lahir' => $req->tanggal_lahir,
                'no_tlp' => $req->no_tlp,
                'jenis_kelamin' => $req->jenis_kelamin,
                'nama' => $req->nama
            ]);
        } else {
            Profile::create([
                'alamat' => $req->alamat,
                'tempat_lahir' => $req->tempat_lahir,
                'tanggal_lahir' => $req->tanggal_lahir,
                'no_tlp' => $req->no_tlp,
                'jenis_kelamin' => $req->jenis_kelamin,
                'nama' => $req->nama,
                'users_id' => $user->id
            ]);
        }

        Session::flash('status', 'Update profile berhasil!!!');
        return redirect()->back();
    }

    public function tiket(){
        $user = Auth::user();
        $tiket= Tiket :: with('bukti')->with('wisata')->get();

        return view('Pengunjung.tiket', compact( 'user','tiket'));
    }
    public function submit_tiket(Request $req)
    {
        $validate = $req->validate([
        'tanggal'=> 'required|max:255',
        'jumlah'=> 'required',
        'wisata_id'=> 'required',


    ]);

        $id = IdGenerator::generate(['table' => 'tikets','field'=>'kode_tiket', 'length' => 8, 'prefix' => date('y')]);
     $harga = Wisata::where('id',$req->get('wisata_id'))->value('harga');
    $tot=$harga * $req->get('jumlah');
    $tiket = new Tiket;
    $tiket->kode_tiket = $id;
    $tiket->tgl_berkunjung = $req->get('tanggal');
    $tiket->jumlah_pengunjung = $req->get('jumlah');
    $tiket->total = $tot;
    $tiket->wisata_id = $req->get('wisata_id');
    $tiket->users_id = auth()->user()->id;

    $tiket->save();
    Session::flash('status', 'Tambah data Tiket berhasil!!!');
    return redirect()->route('Pengunjung.tiket');
    }
    public function submit_pembayaran(Request $req)
    { $validate = $req->validate([
        'bukti'=> 'required|max:255',
        'tiket'=> 'required|max:255',

    ]);
    $id = IdGenerator::generate(['table' => 'buktis','field'=>'kode_bukti', 'length' => 8, 'prefix' => date('y')]);
    $pembayaran = new Bukti;
    $pembayaran->kode_bukti = $id;
    $pembayaran->waktu = Carbon::now();
    $pembayaran->status = Null;
    $pembayaran->tiket_id =$req->get('tiket');
    if($req->hasFile('bukti'))
    {
        $extension = $req->file('bukti')->extension();
        $filename = 'bukti'.time().'.'.$extension;
        $req->file('bukti')->storeAS('public/bukti', $filename);
        $pembayaran->gambar_bukti = $filename;
    }
    $pembayaran->save();
    Session::flash('status', 'Tambah data pembayaran berhasil!!!');
    return redirect()->back();
    }
}
