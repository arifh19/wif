<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;
use App\Ukuran;
use DB;
use PDF;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index()
    {
        $transaksis = Transaksi::with('barangs')->get();
        $total = 0;
        // dd($projects);
        return view('admin.transaksi.index', compact('transaksis', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::groupBy('kode')->get();
        $ukurans = Ukuran::all();
        $arr = $barangs->toArray();
        return view('admin.transaksi.create', compact('ukurans','barangs', 'arr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $user = Auth::user();
        $data = [];
        for ($i=0; $i < @count($request->barang_id); $i++) {
            $data[$request->barang_id[$i]] = [
                'kuantitas'      => $request->kuantitas[$i],
                'updated_at'    => Carbon::now(),
                'created_at'    => Carbon::now()
            ];
        }
        // dd($request);
        $user->transaksi()->create([
            'pelanggan'  => $request->pelanggan,
            'tanggal'  => $request->tanggal,
            'alamat'  => $request->alamat
        ])
        ->barangs()->attach($data);

        if ($user) {
            DB::commit();
            Alert::success('Success', 'Transaksi Berhasil');
            return redirect()->route('admin.transaksi');
        } else {
            DB::rollback();
            Alert::error('Error','Transaksi Gagal');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->with('barangs')->first();
        // dd($project);
        $total = 0;
        return view('admin.transaksi.detail', compact('transaksi', 'total'));
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
