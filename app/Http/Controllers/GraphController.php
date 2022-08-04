<?php

namespace App\Http\Controllers;

use App\Models\CityStat;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function index()
    {
        $cities_stat = CityStat::paginate();
        return view('graph', ["cities_stat"=>$cities_stat]);
    }

    public function api_index()
    {
        $cities_stat = CityStat::paginate();

        $chart_labels_city = [];
        $chart_data_price_m2 = [];
        foreach ($cities_stat as $city_stat) {
            $chart_labels_city[] = $city_stat["city_name_en"];
            $chart_data_price_m2[] = $city_stat["price_m2"];
        }
        $output = [
            "status"=>"ok",
            "labels_city"=>$chart_labels_city,
            "data_price_m2"=>$chart_data_price_m2,
            "cities_stat"=>$cities_stat
        ];
        return response()->json($output);
    }
}
