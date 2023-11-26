<div>
    <div class="card mb-5 mb-xl-10 mt-5">
        <div class="card-header">
            <div class="card-title">
                <h3>Диаграмма за {{ date('Y') }} год</h3>
            </div>
        </div>
        <div class="card-body">
            {{--@dd($getStatsForChart)--}}
            <div>
                <canvas id="myChart" class="mh-400px" style="display: block; box-sizing: border-box; height: 276px; width: 552px;" width="552" height="276"></canvas>
            </div>
            {{--                            <canvas id="kt_chartjs_1" class="mh-400px" style="display: block; box-sizing: border-box; height: 276px; width: 552px;" width="552" height="276"></canvas>--}}
        </div>
    </div>
</div>

@push('myChart')
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                datasets: [{
                    label: 'За ' + {{ date('Y') }} + ' год' ,
                    data: [
                        {{$getStatsForChart['TotalAmountForJanuary']}},
                        {{$getStatsForChart['TotalAmountForFebruary']}},
                        {{$getStatsForChart['TotalAmountForMarch']}},
                        {{$getStatsForChart['TotalAmountForApril']}},
                        {{$getStatsForChart['TotalAmountForMay']}},
                        {{$getStatsForChart['TotalAmountForJune']}},
                        {{$getStatsForChart['TotalAmountForJuly']}},
                        {{$getStatsForChart['TotalAmountForAugust']}},
                        {{$getStatsForChart['TotalAmountForSeptember']}},
                        {{$getStatsForChart['TotalAmountForOctober']}},
                        {{$getStatsForChart['TotalAmountForNovember']}},
                        {{$getStatsForChart['TotalAmountForDecember']}}
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },

                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
@endpush
