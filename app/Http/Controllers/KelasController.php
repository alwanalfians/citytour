<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [
        'kelas' => Kelas::all(),
        'i' => 1
      ];

      return view('kelas.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('kelas.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->all(); //mengambil semua request dari form

      $status = \App\Kelas::create($input);
      if($status) {
        return redirect('kelas')->with('success', 'Data berhasil ditambahkan');
      } else {
        return redirect('kelas/add')->with('error', 'Data gagal ditambahkan');
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
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['edit'] = true;
      $data['result'] = \App\Kelas::where('id_kelas', $id)->first();
      return view('kelas.form')->with($data);
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
      $input = $request->all(); //mengambil semua request dari form

      $status = \App\Kelas::where('id_kelas', $id)->first()->update($input);
      if($status) {
        return redirect('kelas')->with('success', 'Data berhasil diubah');
      } else {
        return redirect('kelas/' . $id . '/edit')->with('error', 'Data gagal diubah');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $kelas = \App\kelas::find($id);
      $kelas->delete();
      return redirect('kelas')->with('success','Data berhasil dihapus');
    }
}
