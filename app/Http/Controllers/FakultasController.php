<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pagination
        // numbering
      $data = Fakultas::when($request->search, function($query) use($request){
            $query->where('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->orderBy('id_fakultas', 'asc')->paginate(5);

        return view('fakultas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fakultas::create(['nama_fakultas' => $request->nama_fakultas]);

        return redirect()->route('fakultas.index');
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
    public function edit($id_fakultas)
    {
        $data = Fakultas::find($id_fakultas);


        return view('fakultas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_fakultas)
    {
          $request->validate([
                 'nama_fakultas'     =>  'required'
            ]);

       $data = Fakultas::find($id_fakultas);
       $data->nama_fakultas = $request->input('nama_fakultas');
       $data->save();
       return redirect()->route('fakultas.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_fakultas)
    {
        $data = Fakultas::findOrFail($id_fakultas);
        $data->delete();

        return redirect()->route('fakultas.index');
    }
}
