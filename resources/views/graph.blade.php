@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
        <canvas id="myChart" height="100px"></canvas>
        <script type="text/javascript">

            const labels = {!! $cities_stat_chart["labels_city"] !!};
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Price for m2 per city',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: {!! $cities_stat_chart["data_price_m2"] !!},
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
                        Ads per 1k people
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
