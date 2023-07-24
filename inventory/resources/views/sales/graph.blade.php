@extends('layouts.app')

@section('content')
    <div class="bg-white py-4 mb-5">

        <div class="h3 pl-4 py-2 border-bottom">Graph</div>
        <div class="border-bottom p-3" style="width: 100%; margin: auto;">
            <form onsubmit="return false" class="row">
                <div class="col-sm-4 text-center ">
                    Start Date
                    <input class="w-100 px-2 py-1" style="border-radius:20px; border:1px solid grey;" type="date"
                        id="startDate">
                </div>
                <div class="col-sm-4 text-center ">
                    End Date
                    <input class="w-100 px-2 py-1" style="border-radius:20px; border:1px solid grey;" type="date"
                        id="endDate">
                </div>
                <div class="col-sm-4">
                    <button class=" btn btn-primary float-right mt-3" onclick="drawCustomChart()">Show Custom Chart</button>
                </div>
            </form>
        </div>
        
       

        <div class="row d-flex justify-content-between mt-4" style="width: 100%; margin: auto;">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Sales (Last 1 month)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $monthlyTotalAmount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                     Sales (Last 3 month)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $threeMonthsTotalAmount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                     Sales (Last 1 year)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $oneYearTotalAmount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Sales (Range Date)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="totalAmount">-</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-1  p-2 h-100 " margin: auto;">
                <div class="border p-2 " style="border-radius:8px;"><canvas id="monthlySalesChart"></canvas>
                </div>
            </div>

            <div class="col-6 mt-1  p-2 " margin: auto;">
                <div class="border p-2" style="border-radius:8px;"><canvas id="threeMonthsSalesChart"></canvas></div>
            </div>

            <div class="col-6 mt-1  p-2 " margin: auto;">
                <div class="border p-2" style="border-radius:8px;"><canvas id="oneYearSalesChart"></canvas></div>
            </div>

            <div class="col-6 mt-1  p-2 " margin: auto;">
                <div class="border p-2" style="border-radius:8px;"><canvas id="customSalesChart"></canvas></div>
            </div>

          
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var monthlySalesData = @json($monthlySales);
        var threeMonthsSalesData = @json($threeMonthsSales);
        var oneYearSalesData = @json($oneYearSales);


        var formatData = function(salesData) {
            return {
                labels: salesData.map(item => item.issue_date),
                data: salesData.map(item => item.total_amount),
            };
        };


        var drawChart = function(ctx, chartData, label) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: label,
                        data: chartData.data,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        };


        var ctxMonthlySales = document.getElementById('monthlySalesChart').getContext('2d');
        var monthlySalesChartData = formatData(monthlySalesData);
        drawChart(ctxMonthlySales, monthlySalesChartData, 'Penjualan 1 Bulan Terakhir');


        var ctxThreeMonthsSales = document.getElementById('threeMonthsSalesChart').getContext('2d');
        var threeMonthsSalesChartData = formatData(threeMonthsSalesData);
        drawChart(ctxThreeMonthsSales, threeMonthsSalesChartData, 'Penjualan 3 Bulan Terakhir');


        var ctxOneYearSales = document.getElementById('oneYearSalesChart').getContext('2d');
        var oneYearSalesChartData = formatData(oneYearSalesData);
        drawChart(ctxOneYearSales, oneYearSalesChartData, 'Penjualan 1 Tahun Terakhir');

        var drawCustomChart = function() {
            var startDate = document.getElementById('startDate').value;
            var endDate = document.getElementById('endDate').value;


            fetch('/getSalesDataCustom', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        startDate: startDate,
                        endDate: endDate
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    var customSalesChartData = formatData(data.salesData);
                    var ctxCustomSales = document.getElementById('customSalesChart').getContext('2d');
                    drawChart(ctxCustomSales, customSalesChartData, `Custom Sales (${startDate} to ${endDate})`);


                    document.getElementById('totalAmount').innerText = data.totalAmount;
                })
                .catch(error => {
                    console.error('Error fetching custom sales data:', error);
                });
        };
    </script>
@endsection
