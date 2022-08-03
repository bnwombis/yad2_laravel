<?php

namespace App\Http\Controllers;

use App\Models\CityStat;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function index()
    {
        $cities_stat = CityStat::paginate(15);

        return view('graph', compact('cities_stat'));
    }
}
