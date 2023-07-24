@extends('layouts.app')

@section('content')
    <div class="container">



        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Customer</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $customerCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Sales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSalesThisMonth }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Sold Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $soldProductsThisMonth }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProductionThisMonth }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->


            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-6 mb-4 row ">
                <div class="col-12 mt-1  h-100 " margin: auto;">
                    <div class="border p-2 " style="border-radius:8px;"><canvas id="monthlySalesChart"></canvas>
                    </div>
                </div>
            </div>



        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var monthlySalesData = @json($monthlySales);


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
