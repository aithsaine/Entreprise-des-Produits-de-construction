@extends('layouts.admin')

@section('content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>admin</li>
                <li>Tableau de Board</li>
            </ul>
        </div>
    </section>

    <div class=" p-4 container mx-auto mt-8 grid gap-4 grid-cols-2 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Chiffre d'affaire card -->
        <div class="bg-blue-500 p-6 rounded-lg shadow-md text-white">
            <div class="flex items-center">
                <span class="text-2xl mr-3">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd"
                            d="M10 2a8 8 0 100 16 8 8 0 000-16zM1 10a9 9 0 0116-5.12 2.5 2.5 0 00-3.86-.29A3 3 0 009.5 10H7a1 1 0 01-1-1V6a1 1 0 112 0v2h2a1 1 0 100-2H9.5a1.5 1.5 0 011.14.54 4 4 0 003.15 1.93 5 5 0 11-7.23-5.35L6 7a1 1 0 011.42-1.42l2 2a1 1 0 010 1.42l-4 4a1 1 0 11-1.42-1.42L7 9a1 1 0 011.42-1.42l2 2a1 1 0 010 1.42l-4 4a1 1 0 11-1.42-1.42L7 11z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <div>
                    <p class="text-lg font-semibold">Chiffre d'affaire</p>
                    <p class="text-sm">du mois {{ $month }}</p>
                </div>
            </div>
            <p class="text-2xl mt-4 font-bold tabular-nums">{{ $chiffre }} MAD</p>
        </div>

        <!-- Clients card -->
        <div class="bg-green-500 p-6 rounded-lg shadow-md text-white">
            <div class="flex items-center">
                <span class="text-2xl mr-3">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 3a1 1 0 011-1h14a1 1 0 011 1v8a1 1 0 11-2 0V4H3v12h7a1 1 0 110 2H3a1 1 0 01-1-1V3z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M7 15a1 1 0 100 2 1 1 0 000-2zM7 11a1 1 0 100 2 1 1 0 000-2zM7 7a1 1 0 100 2 1 1 0 000-2zM12 15a1 1 0 100 2 1 1 0 000-2zM12 11a1 1 0 100 2 1 1 0 000-2zM12 7a1 1 0 100 2 1 1 0 000-2zM17 15a1 1 0 100 2 1 1 0 000-2zM17 11a1 1 0 100 2 1 1 0 000-2zM17 7a1 1 0 100 2 1 1 0 000-2z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <div>
                    <p class="text-lg font-semibold">Clients</p>
                    <p class="text-sm">Total clients</p>
                </div>
            </div>
            <p class="text-2xl mt-4 font-bold">{{ $count_clients }}</p>
        </div>

        <!-- Fournisseurs card -->
        <div class="bg-yellow-500 p-6 rounded-lg shadow-md text-white">
            <div class="flex items-center">
                <span class="text-2xl mr-3">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a2 2 0 100 4V7H6v6h5a1 1 0 010 2H5a3 3 0 110-6h7V7a4 4 0 00-4-4H4a1 1 0 01-1-1zM6 5v2h8V5H6z"
                            clip-rule="evenodd" />
                        <path d="M9 14a1 1 0 100-2 1 1 0 000 2z" />
                    </svg>
                </span>
                <div>
                    <p class="text-lg font-semibold">Fournisseurs</p>
                    <p class="text-sm">Total fournisseurs</p>
                </div>
            </div>
            <p class="text-2xl mt-4 font-bold">98</p>
        </div>
        <!-- Commands card -->
        <div class="bg-red-500 p-6 rounded-lg shadow-md text-white">
            <div class="flex items-center">
                <span class="text-2xl mr-3">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 4a1 1 0 100 2h10a1 1 0 110 2H3a1 1 0 100 2h10a1 1 0 110 2H5a1 1 0 100 2h8a1 1 0 010 2H5a3 3 0 010-6h8a3 3 0 000-6H3zm1 4a1 1 0 100 2h8a1 1 0 010 2H4a1 1 0 100 2h6a1 1 0 010 2H4a3 3 0 010-6h6a3 3 0 000-6H4z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <div>
                    <p class="text-lg font-semibold">Commands</p>
                    <p class="text-sm">Total commands</p>
                </div>
            </div>
            <p class="text-2xl mt-4 font-bold">{{ count($current_commands) }}</p>
        </div>
    </div>
    </div>
    <hr class="p-4">
    <h1 class="text-sky-800 text-bold m-2 text-lg">Le Chiffre d'affaire des derniere six mois</h1>
    <hr class="p-4">
    <div id="chartdiv"></div>
@endsection
@section('script')
    <script>
        const labels = @json($values);
        am5.ready(function() {

            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");


            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
                layout: root.verticalLayout
            }));

            var colors = chart.get("colors");
            var data = [];
            for (key in labels){
                data.push({
                    month:key,
                    amount:labels[key]
                })
            }
            

            prepareParetoData();

            function prepareParetoData() {
                var total = 0;

                for (var i = 0; i < data.length; i++) {
                    var value = data[i].amount;
                    total += value;
                }

                var sum = 0;
                for (var i = 0; i < data.length; i++) {
                    var value = data[i].amount;
                    sum += value;
                    data[i].pareto = sum / total * 100;
                }
            }



            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            })

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                categoryField: "month",
                renderer: xRenderer
            }));

            xRenderer.grid.template.setAll({
                location: 1
            })

            xRenderer.labels.template.setAll({
                paddingTop: 20
            });

            xAxis.data.setAll(data);

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererY.new(root, {
                    strokeOpacity: 0.1
                })
            }));

            var paretoAxisRenderer = am5xy.AxisRendererY.new(root, {
                opposite: true
            });
            var paretoAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: paretoAxisRenderer,
                min: 0,
                max: 100,
                strictMinMax: true
            }));

           


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "amount",
                categoryXField: "month"
            }));

            series.columns.template.setAll({
                tooltipText: "{categoryX}: {valueY}",
                tooltipY: 0,
                strokeOpacity: 0,
                cornerRadiusTL: 6,
                cornerRadiusTR: 6
            });

            series.columns.template.adapters.add("fill", function(fill, target) {
                return chart.get("colors").getIndex(series.dataItems.indexOf(target.dataItem));
            })


            // pareto series
            var paretoSeries = chart.series.push(am5xy.LineSeries.new(root, {
                xAxis: xAxis,
                yAxis: paretoAxis,
                valueYField: "pareto",
                categoryXField: "month",
                stroke: root.interfaceColors.get("alternativeBackground"),
                maskBullets: false
            }));

            paretoSeries.bullets.push(function() {
                return am5.Bullet.new(root, {
                    locationY: 1,
                    sprite: am5.Circle.new(root, {
                        radius: 5,
                        fill: series.get("fill"),
                        stroke: root.interfaceColors.get("alternativeBackground")
                    })
                })
            })

            series.data.setAll(data);
            paretoSeries.data.setAll(data);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>
@endsection
