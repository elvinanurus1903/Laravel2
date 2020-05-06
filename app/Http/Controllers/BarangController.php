<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        $data = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%')
             ->orWhere('nama_ruangan', 'LIKE', '%'.$request->search.'%')
             ->orWhere('total', 'LIKE', '%'.$request->search.'%')
             ->orWhere('broken', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'id_ruangan', '=', 'barang.ruangan_id')
        ->join('users', 'id', '=', 'barang.created_by')
        ->orderBy('id_barang', 'asc')->paginate(5);

        return view('barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        $data = \App\Ruangan::all();
    
        return view('barang.create')->with('data', $data);;
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
            'nama_barang'    =>  'required|unique:barang|max:50',
            'ruangan_id'     =>  'required|numeric|min:1',
            'total'    =>  'required|numeric|min:1',
            'broken'     =>  'required|numeric',
            'created_by'     =>  'required|numeric|min:1',
            'updated_by'    =>  'required|numeric|min:1',
            'image'         =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2480'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'nama_barang'       =>   $request->nama_barang,
            'ruangan_id'        =>   $request->ruangan_id,
            'total'       =>   $request->total,
            'broken'        =>   $request->broken,
            'created_by'        =>   $request->created_by,
            'updated_by'        =>   $request->updated_by,
            'image'            =>   $new_name
        );

        Barang::create($form_data);

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Ditambahkan.');
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
    
    public function edit($id_barang)
    {
        $ruangan = \App\Ruangan::all();
        $barang = Barang::findOrFail($id_barang);
        return view('barang.edit', compact('barang'))->with('ruangan', $ruangan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id_barang)
    { 
          $request->validate([
            'nama_barang'    =>  'required|max:50',
            'ruangan_id'     =>  'required|numeric|min:1',
            'total'    =>  'required|numeric|min:1',
            'broken'     =>  'required|numeric|min:1',
            'created_by'     =>  'required|numeric|min:1',
            'updated_by'    =>  'required|numeric|min:1',
            ]);


       $barang = Barang::find($id_barang);
       $barang->nama_barang = $request->input('nama_barang');
       $barang->ruangan_id = $request->input('ruangan_id');
       $barang->total = $request->input('total');
       $barang->broken = $request->input('broken');
        $barang->created_by = $request->input('created_by');
       $barang->updated_by = $request->input('updated_by');
       $barang->save();

       if ($request->hasFile('image')) {
            $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
            $barang->image = $request->file('image')->getClientOriginalName();
        }

        $barang->save();
       return redirect()->route('barang.index')->with('success', 'Data Berhasil Diubah.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function delete($id_barang)
    {
        $data = Barang::findOrFail($id_barang);
        $data->delete();

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
