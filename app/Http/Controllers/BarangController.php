<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Transaksi;
use App\Ukuran;
use RealRashid\SweetAlert\Facades\Alert;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ukurans = Ukuran::all();
        return view('admin.barang.create', compact('ukurans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::create([
            'kode'  => $request->kode,
            'nama'  => $request->nama,
            'satuan'  => $request->satuan,
            'stok'  => $request->stok,
            'ukuran_id'  => $request->ukuran_id,
            'harga'  => $request->harga,

        ]);
        if (!$barang) {
            Alert::error('Error','Failed');
            return redirect()->back();
        }
        Alert::success('Success','Berhasil Menambahkan barang');
        return redirect()->route('admin.barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kode)
    {
        //$ukuran = Ukuran::where('id', Barang::where('kode',$kode)->get())->get();
        $barang = Barang::where('kode', $kode)->get();
        //
        foreach ($barang as $key => $value) {
            $ukuran[$key] =  Ukuran::where('id', $value->ukuran_id)->first();
        }
        return response()->json([
          'result'  => $ukuran,
        ]);
    }

    public function show2($kode,$ukuran)
    {
        if($kode=="null" && $ukuran="null"){
            return response()->json([
                'result'  => "",
            ]);
        }else if($kode=="null"){
            return response()->json([
                'result'  => "",
            ]);
        }else if($ukuran=="null"){
            return response()->json([
                'result'  => "",
            ]);
        }
        else{
            $barang = Barang::where('kode', $kode)->where('ukuran_id', $ukuran)->first();
            if($barang==null){
                return response()->json([
                'result'  => "none",
                ]);
            }else{
                return response()->json([
                    'result'  => $barang,
                    'ukuran'  => $barang->ukuran->ukuran
                ]);
            }
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('admin.barang.edit',compact('barang'));
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
        $barang = Barang::where('id', $id)->first();
        $barang->stok=$barang->stok+$request->stok;
        $barang->harga=$request->harga;

        $barang->save();

        if (!$barang) {
            Alert::error('Error','Failed');
            return redirect()->back();
        }
        Alert::success('Success','Berhasil update barang');
        return redirect()->route('admin.barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::where('id', $id)->first();
        $barang->delete();

        if (!$barang) {
            Alert::error('Error','Failed');
            return redirect()->back();
        }
        Alert::success('Success','Berhasil menghapus Barang');
        return redirect()->route('admin.barang');
    }
}
