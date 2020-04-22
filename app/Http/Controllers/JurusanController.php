<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $data = Jurusan::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', '%'.$request->search.'%')
             ->orWhere('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->join('fakultas', 'id_fakultas', '=', 'jurusan.fakultas_id')->orderBy('id', 'asc')->paginate(5);

        return view('jurusan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = \App\Fakultas::all();
    
        return view('jurusan.create')->with('data', $data);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'    =>  'required|unique:jurusan|max:150',
            'fakultas_id'     =>  'required|numeric|min:1'
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'jfakultas_id'        =>   $request->fakultas_id,

        );

        Jurusan::create($form_data);

        return redirect()->route('jurusan.index');
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
        
        $fakultas = \App\Fakultas::all();
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'))->with('fakultas', $fakultas);
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

         $request->validate([
                 'name'     =>  'required|max:150',
                 'fakultas_id' => 'required'
            ]);

       $data = Jurusan::find($id);
       $data->name = $request->input('name');
       $data->fakultas_id = $request->input('fakultas_id');
       $data->save();
         return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         Jurusan::whereId($id)->delete();

        return redirect()->route('jurusan.index');
    }
}
