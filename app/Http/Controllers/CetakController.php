<?php

namespace App\Http\Controllers;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\Ruangan;
use App\User;
 
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
}