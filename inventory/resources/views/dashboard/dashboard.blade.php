@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard baru</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>       
                @endif

                <div class="card mt-3">
                    <div class="card-header">Total Customers</div>
                    <div class="card-body">
                        <h1>{{ $customerCount }}</h1>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">stock available</div>
                    <div class="card-body">
                        <h1>{{ $totalStock }}</h1>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">Sold Products This Month</div>
                    <div class="card-body">
                        <h1>{{ $soldProductsThisMonth }}</h1>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">Total Sales This Month</div>
                    <div class="card-body">
                        <h1>{{ $totalSalesThisMonth }}</h1>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">Total Production This Month</div>
                    <div class="card-body">
                        <h1>{{ $totalProductionThisMonth }}</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>    
</div>
    
@endsection