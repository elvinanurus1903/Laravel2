<?php

namespace App\Exports;

use App\Jurusan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class JurusanExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('jurusan.jurusan_excel', [
            'jurusan' => Jurusan::all()
        ]);
    }
}
