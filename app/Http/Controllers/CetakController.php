<?php

namespace App\Http\Controllers;
use App\Exports\BarangExport;
use App\Exports\JurusanExport;
use App\Imports\FakultasImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\Ruangan;
use App\User;
use App\Jurusan;
use App\Fakultas;
use Session; 
use PDF;
 
class CetakController extends Controller
{
 
    public function cetak_pdf()
    {
    	$barang = Barang::all();
    	$ruangan = Ruangan::all();
    	$user = User::all();
 
    	$pdf = PDF::loadview('barang.data_pdf',['barang'=>$barang,'ruangan' => $ruangan, 'user' => $user]);
    	return $pdf->download('Data_barang_PDF');
    }

    public function export_excel()
	{
		return Excel::download(new BarangExport, 'Barang.xlsx');
	}

    public function export_excel_jurusan()
    {
        return Excel::download(new JurusanExport, 'Jurusan.xlsx');
    }

     public function cetak_pdf_jurusan()
    {
        $jurusan = Jurusan::all();
        $fakultas = Fakultas::all();
 
        $pdf = PDF::loadview('jurusan.datajurusan_pdf',['jurusan'=>$jurusan,'fakultas' => $fakultas]);
        return $pdf->download('Data_Jurusan_PDF');
    }

    public function import(Request $request)
    {
      // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $filename = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('excel/fakultas',$filename);
 
        // import data
        Excel::import(new FakultasImport, public_path('/excel/fakultas/'.$filename));
 
        // alihkan halaman kembali
        return redirect()->route('fakultas.index')->with('success', 'Data Berhasil Diimport.');;
    }

}