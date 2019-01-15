<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ukuran;
use RealRashid\SweetAlert\Facades\Alert;

class UkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ukurans = Ukuran::all();
        return view('admin.ukuran.index', compact('ukurans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ukuran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ukuran = Ukuran::create([
            'ukuran'  => $request->ukuran,

        ]);
        if (!$ukuran) {
            Alert::error('Error','Failed');
            return redirect()->back();
        }
        Alert::success('Success','Berhasil Menambahkan ukuran');
        return redirect()->route('admin.ukuran');
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
        $ukuran = Ukuran::where('id', $id)->first();
        return view('admin.ukuran.edit',compact('ukuran'));
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
        $ukuran = Ukuran::where('id', $id)->first();
        $ukuran->ukuran=$request->ukuran;

        $ukuran->save();

        if (!$ukuran) {
            Alert::error('Error','Failed');
            return redirect()->back();
        }
        Alert::success('Success','Berhasil update Ukuran');
        return redirect()->route('admin.ukuran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ukuran = Ukuran::where('id', $id)->first();
        $ukuran->delete();

        if (!$ukuran) {
            Alert::error('Error','Failed');
            return redirect()->back();
        }
        Alert::success('Success','Berhasil menghapus Ukuran');
        return redirect()->route('admin.ukuran');
    }
}
