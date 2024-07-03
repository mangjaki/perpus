@extends('layout.main')

@section('title','dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>DASHBOARD</h2>
            {{-- HTML --}}
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

            <figure class="highcharts-figure">
                <div id="container"></div>
                {{-- <p class="highcharts-description">
                    A basic column chart comparing estimated corn and wheat production
                    in some countries.

                    The chart is making use of the axis crosshair feature, to highlight
                    the hovered country.
                </p> --}}
            </figure>

            <style>

            {{-- CSS --}}
            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 800px;
                margin: 1em auto;
            }

            #container {
                height: 400px;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #ebebeb;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }

            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }

            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }

            .highcharts-data-table td,
            .highcharts-data-table th,
            .highcharts-data-table caption {
                padding: 0.5em;
            }

            .highcharts-data-table thead tr,
            .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }

            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }
            </style>
            <script>
                /* js */
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Jumlah Peminjaman Buku berdasarkan Genre Buku',
                        align: 'center'
                    },
                    subtitle: {
                        text:
                            'My instagram: <a target="_blank" ' +
                            'href="https://www.indexmundi.com/agriculture/?commodity=corn">mhammdzacky_</a>',
                        align: 'center'
                    },
                    xAxis: {
                        categories: [
                            @foreach ($peminjamanbuku as $item)
                                '{{ $item->genre }}',
                            @endforeach
                        ],
                        crosshair: true,
                        accessibility: {
                            description: 'Genre Buku'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah Orang'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' (1000 MT)'
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [
                        {
                            name: 'Pinjaman Buku',
                            data: [
                                @foreach ($peminjamanbuku as $item)
                                {{ $item->jumlah }},
                                @endforeach
                            ]
                        }
                    ]
                });

            </script>
        </div>
    </div>
@endsection
