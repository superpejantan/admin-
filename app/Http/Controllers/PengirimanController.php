<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use yajra\DataTables\DataTables;
use App\pemesan;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans =DB::table('pesanan')->get();
        return view('order.pengiriman', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function yajra_pengiriman()
    {
       $Pengiriman = DB::table('pesanan')->get();

       return DataTables::of($Pengiriman)
            ->addColumn('action', function($id_p){
                $id = $id_p->id;
                return '<a href="#" id-barang="'.$id.'" 
                class="btn btn-primary btn-barang"><i class="glyphicon glyphicon-edit"></i> Barang</a>'.
                '<a href="#" id-paket="'.$id.'" 
                class="btn btn-success btn-paket"><i class="glyphicon glyphicon-edit"></i>Pengiriman</a>';
            })->editColumn('penerima', function($penerima){
                $pnrma = $penerima->nama_penerima;
                return $pnrma;
            })->editColumn('alamat', function($alamat){
                $almt = $alamat->alamat;
                return $almt;
            })->editColumn('telepon', function($telepon){
                $tlp = $telepon->telepon;
                return  $tlp;
            })->make('true');
    }

    public function create()
    {
        $Pengiriman = DB::table('layanan_pengiriman')->get();

       return DataTables::of($Pengiriman)
            ->addColumn('action', function($id_p){
                $id = $id_p->id;
                return '<a href="#" id-pesanan="'.$id.'" 
                class="btn btn-xs btn-primary btn-edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })->editColumn('hari', function($hari){
                $pnrma = $hari->hari;
                return $pnrma;
            })->editColumn('ongkos', function($ongkos){
                $ogks = $ongkos->ongkos;
                return $ogks;
            })->editColumn('paket', function($paket){
                $pkt = $paket->paket;
                return $pkt;
            })->make('true');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_barang($id)
    {
        $details = DB::table('pesanan_barang')
                        ->join('barang','pesanan_barang.id_barang','barang.id_barang')
                        ->where('pesanan_barang.pesanan_id', $id)->get();
        $pesanan = array();

        foreach ($details as $detail) {
            $detailArray = array();
            $detailArray['barang'] = $detail->barang;
            $detailArray['qty'] = $detail->qty;
            array_push($pesanan, $detailArray);
        }

        return response()->json([
            'hasil'=>$pesanan
        ]);
    }

    public function get_paket($id)
    {
        $pakett = DB::table('layanan_pengiriman')->where('pesanan_id', $id)->first();

        return response()->json([
            'biaya'=>$pakett->ongkos,
            'waktu' => $pakett->hari,
            'paket' => $pakett->paket
        ]);
    }

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
