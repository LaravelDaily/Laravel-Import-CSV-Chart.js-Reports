@extends('layouts.app')

@section('content')
    <div class="row">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        @foreach ($reports as $report)
        <div class="col-md-6">
            <h2 style="margin-top: 0;">{{ $report['reportTitle'] }}</h2>

            <canvas id="myChart{{ $report['reportTitle'] }}"></canvas>

            <script>
                var ctx = document.getElementById("myChart{{ $report['reportTitle'] }}");
                var myChart = new Chart(ctx, {
                    type: '{{ $report['chartType'] }}',
                    data: {
                        labels: [
                            @foreach ($report['results'] as $group => $result)
                                "{{ $group }}",
                            @endforeach
                        ],

                        datasets: [{
                            label: '{{ $report['reportLabel'] }}',
                            data: [
                                @foreach ($report['results'] as $group => $result)
                                    {!! $result !!},
                                @endforeach
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
        @endforeach
    </div>
@stop
