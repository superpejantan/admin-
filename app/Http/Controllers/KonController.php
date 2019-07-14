<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\DataTables;
use DB;
use App\pesanan;
use App\barang;

class KonController extends Controller
{
    
    public function index()
        {
            $konfirmasi = pesanan::all();
           
            

           
             //dd($barang);
            return view('konfirmasi.orderlist',['konfirmasi'=>$konfirmasi]);
           
        
        }

    public function yajra_index()
    {
        $pesanan = DB::table('pesanan')->get();
        $user =[];
            foreach($pesanan as $p){
                $user[] = $p->id_users;
                 }


            $barang = DB::table('barang_peasanan')
                ->join('pesanan','barang_pesanan.id_user', 'pesanan.id')
                ->where('pesanan_barang.id_users', $user)
                ->get();

        return view('konfirmasi.konfirmasi',['barang'=>$barang]);

    }

    public function konfirmasi()
    {
        $verifikasi = DB::table('status_invoice')->whereIn('id_status', [3,4])->get();
        return view('konfirmasi.konfirmasi',['verifikasi'=>$verifikasi]);
    }

    public function yajra_konfirmasi()
    {
        $konfirmasi = DB::table('pesanan')
                    ->join('status_invoice','pesanan.id_status','status_invoice.id_status')
                    ->join('akun_pembayaran','pesanan.id_bank', 'akun_pembayaran.id')
                    ->where('pesanan.id_status', 2)
                    ->get();

        return DataTables::of($konfirmasi)
        ->addColumn('action', function($id_p){
            $id = $id_p->id_pesanan;
            return '<a href="#" id-pesanan="'.$id.'" 
                class="btn btn-xs btn-primary btn-edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })->editColumn('penerima', function($penerima){
            $pnrma = $penerima->nama_penerima;
            return $pnrma;
        })->editColumn('alamat', function($almt){
            $alamat = $almt->alamat;
            return $alamat;
        })->editColumn('total', function($totl){
            $total = $totl->total_bayar;
            return $total;
        })->editColumn('transfer', function($bank){
            $n_bank = $bank->bank;
            return $n_bank;
        })->editColumn('status', function($status){
            $stts = $status->status;
            return $stts;
        })->editColumn('tanggal', function($tanggal){
            $tgl = $tanggal->created_at;
            return $tgl;
        })->make('true');
    }


    public function get_konfirmasi($id)
    {
        $konfirmasi = DB::table('pesanan')->where(' id_status', 2)->where('id', $id)->first();

        return response()->json([
                'id'=> $konfirmasi->id
        ]);
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
        $konfirmasi = DB::table('pesanan')->where('id_pesanan', $id)->first();

        return response()->json([
            'id'=> $konfirmasi->id_pesanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $konfirmasi = DB::table('pesanan')->where('id_pesanan', $request->id)->update([
            'id_status'=> $request->id_status
        ]);
        return redirect()->back();
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
