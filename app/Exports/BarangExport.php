<?php

namespace App\Exports;

use App\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class BarangExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('barang.barang_excel', [
            'barang' => Barang::all()
        ]);
    }
}
