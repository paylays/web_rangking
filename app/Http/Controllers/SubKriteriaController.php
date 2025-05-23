<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $subkriterias = SubKriteria::with('kriteria')
            ->orderBy('kriteria_id')
            ->orderBy('bobot', 'asc')
            ->get()
            ->groupBy('kriteria_id');

        return view('pages.sub-kriteria.index', [
            'groupedSubkriterias' => $subkriterias
        ]);
    }
}
