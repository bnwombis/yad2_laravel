<?php

namespace App\Http\Controllers;

use App\Models\CityStat;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function index()
    {
        $cities_stat = CityStat::paginate(15);
//        TODO make api for output this data
        $cities_stat_chart = [];
        $chart_labels_city = [];
        $chart_data_price_m2 = [];
        foreach ($cities_stat as $city_stat) {
            $chart_labels_city[] = $city_stat["city_name_en"];
            $chart_data_price_m2[] = $city_stat["price_m2"];
        }
        $cities_stat_chart["labels_city"] = json_encode($chart_labels_city);
        $cities_stat_chart["data_price_m2"] = json_encode($chart_data_price_m2);
//        dd($cities_stat_chart);
        return view('graph', ["cities_stat"=>$cities_stat, "cities_stat_chart" => $cities_stat_chart]);
    }
}
