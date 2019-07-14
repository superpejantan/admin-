<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         return view('layar.barang');

    }

    public function yajra_barang()
    {
        $Barang = DB::table('barang')
                    
                    ->get();

        return Datatables::of($Barang)
        ->addColumn('action', function($barang){
                $id = $barang->id_barang;
                return '<a href="#" id-barang="'.$id.'" 
                class="btn btn-xs btn-primary btn-edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })->editColumn('id', function($id){
                $id = $id->id_barang;
                return $id;
        })->editColumn('barang', function($barang){
                $brg = $barang->barang;
            return $brg;
        })->editColumn('gambar', function($gambar){
                $gmbr = $gambar->gambar;
            return $gmbr;
        })->editColumn('harga', function($harga){
                $hrg = $harga->harga;
            return $hrg;
        })->editColumn('jumlah', function($jumlah){
                $jml = $jumlah->jumlah;
            return $jml;
        })->editColumn('total', function($total){
                $ttl = $total->total;
            return $ttl;
        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('barang')->paginate(10);
        return view('layar.jjl',['barang'=>$barang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $barang = $request->barang;
        $harga  = $request->harga;
        $id_kategori = $request->id_kategori;
        $jumlah = $request->jumlah;
		$total = ($harga * $jumlah);
		$detail = $request->detail;
        $id_status = $request->id_status;

        DB::table('barang')->insert([
            
            'barang'=>$barang,
            'harga' =>$harga,
			'detail' => $detail,
            'id_kategori' =>$id_kategori,
            'jumlah' =>$jumlah,
			'total' => $total,
            'id_status' =>$id_status
        ]);
        return redirect()->back();
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
        $barang = DB::table('barang')->where('id_barang',$id)->first();

        return response()->json([
            'id_barang'=> $barang->id_barang,
            'barang'=> $barang->barang,
            'harga'=> $barang->harga,
            'jumlah'=> $barang->jumlah,
            'gambar'=> $barang->gambar,
            'total'=> $barang->total
            
        ]);
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

    public function jumlah()
    {
        $jumlah =DB::table('barang')->count();

        return view('layar.beranda', ['jumlah'=>$jumlah]);
    }
}
