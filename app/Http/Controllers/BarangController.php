<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use Alert;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
       public function index()
    {
        $barang = \App\Models\Barang::All();
        return view ('admin.barang',['barang'=>$barang]);
        
    }
    public function create()
    {
        return view ('admin.barang.input');
    }

    
    public function store(Request $request)
    {
        $tambah_barang=new \App\Models\Barang;
        $tambah_barang->kd_brg = $request->addkdbrg;
        $tambah_barang->nm_brg = $request->addnmbrg;
        $tambah_barang->harga = $request->addharga;
        $tambah_barang->stok = $request->addstok;
        $tambah_barang->timestamps = false;
        $tambah_barang->save();
        Alert::success('Pesan','Data berhasil disimpan');
        return redirect ('/barang');
    }

    public function destroy ($kd_brg)
    {
        $barang=\App\Models\Barang::findorFail($kd_brg);
        $barang ->delete();
        Alert::success('Pesan', 'Data berhasil dihapus');
        return redirect()->route('barang.index');
    }
    
    public function edit ($kd_brg)
    {
        $bar_edit=\App\Models\Barang::findorFail($kd_brg);
        return view ('admin.editBarang', ['barang'=> $bar_edit]);

    }
    public function update (Request $request, $kd_brg)
    {
        $brg= \App\Models\Barang::findorFail($kd_brg);
        $brg ->kd_brg = $request -> get ('addkdbrg');
        $brg ->nm_brg = $request -> get ('addnmbrg');
        $brg ->harga = $request -> get ('addharga');
        $brg ->stok = $request -> get ('addstok');
        $brg -> save();

        return redirect() ->route ('barang.index', [$kd_brg]);

    }
}
