@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
        <canvas id="myChart" height="100px"></canvas>
        <script type="text/javascript">
            let labels_city = {},
                data_price_m2 = {};
            let json_data;
            function show_chart(json_data) {
                // alert();
                const data = {
                    labels: json_data.labels_city,
                    datasets: [{
                        label: 'Price for m2 per city',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: json_data.data_price_m2,
                    }]
                };

                const config = {
                    type: 'line',
                    data: data,
                    options: {}
                };

                new Chart(
                    document.getElementById('myChart'),
                    config
                );
            }
            fetch('{{ route("api_graph_index", ["page" => $cities_stat->currentPage()]) }}')
                .then(response => response.json())
                .then(data =>
                    show_chart(data)
                )
                .catch(error => console.log(error))

        </script>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <th scope="col">
                        City Name
                    </th>
                    <th scope="col">
                        Ads
                    </th>
                    <th scope="col">
                        Price for m2
                    </th>
                    <th scope="col">
                        Ads per 1k
                    </th>
                    <th scope="col">
                        Comments
                    </th>
                    <th scope="col">
                        Add comment
                    </th>
                    </thead>
                    <tbody>
                    @foreach ($cities_stat as $city_stat)
                        <tr>
                            <td>
                                {{ $city_stat->city_name_en }}
                            </td>
                            <td>
                                {{ $city_stat->ads_count }}
                            </td>
                            <td>
                                {{ $city_stat->price_m2 }}
                            </td>
                            <td>
                                {{ $city_stat->ads_per_people_1k }}
                            </td>
                            <td>
                                <a href="{{ route("comments_show", ["city_stat_id"=>$city_stat->id] ) }}">
                                    {{ $city_stat->comments->count() }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route("comment_add", ["city_stat_id"=>$city_stat->id] ) }}">
                                    <button type="button" class="btn btn-primary btn-sm">Add</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $cities_stat->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection
