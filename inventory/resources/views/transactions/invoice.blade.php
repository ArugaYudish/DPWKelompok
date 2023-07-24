<!DOCTYPE html>
<html>
<head>
    <title>MBKM Invoice PDF - DPWL.com</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-5{
        margin-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .mt-30{
        margin-top:30px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .w-70{
        width:70%;   
    }
    .w-30{
        width:30%;   
    }
    .w-40{
        width:40%;   
    }
    .logo img{
        width: 60px;
        height: 60px;
        padding-top:3px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        font-weight: 300;
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table th{
        border: none;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr,th,td{
        border: 1px solid #f8f9fa;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: rgb(49, 64, 87);
        color: whitesmoke;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
        background: rgb(233, 235, 240);
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:14px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
    .text-blue {
        color: cornflowerblue;
    }
    .text-invoice {
        font-size: 13px;
    }
    .signature p {
        font-size: 13px;
        line-height:10px;
        font-weight: bold;
    }
    /* .hr-invoice{
        width: 90%;
        margin-left: 0px;
        color: #5D5D5D;
    }
    .hr-pabrik{
        width: 90%;
        margin-right: 0px;
        color: #5D5D5D;
    } */
    /* .headline hr{
        width: 80%;
        margin-left: 0px;
    } */
</style>

<body>
    <div class="headline mt-10">
        <div class="w-50 float-left mt-10">
            <h1 class="text-blue">Invoice</h1>
            {{-- <hr class="hr-invoice"> --}}
        </div>
        <div class="w-50 float-left mt-10" align="right">
            <h1 class="text-blue">Pabrik Bricket DPW</h1>
            {{-- <hr class="hr-pabrik"> --}}
        </div>
        <div style="clear: both;"></div>
    </div>
<div class="add-detail mt-5">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 w-100 text-bold text-invoice">Invoice Id - <span class="gray-color">{{ $transaction->id }}</span></p>
        <p class="m-0 pt-5 w-100 text-bold text-invoice">Issue Date - <span class="gray-color">{{ $transaction->issue_date }}</span></p>
        <p class="m-0 pt-5 w-100 text-bold text-invoice">Due Date - <span class="gray-color">{{ $transaction->due_date }}</span></p>
    </div>
    <div class="w-50 float-left logo mt-5" align="right">
        <img src="https://www.nicesnippets.com/image/imgpsh_fullsize.png">
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Kelompok DPWL</p>
                    <p>360004</p>
                    <p>Purwokerto</p>
                    <p>Indonesia</p>
                    <p>Contact : 1234567890</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{ $transaction->customer->name }}</p>
                    <p>{{ $transaction->customer->postalcode }}</p>
                    <p>{{ $transaction->customer->address }}</p>
                    <p>Indonesia</p>
                    <p>Contact : {{ $transaction->customer->phone_number }}</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-100">Payment Method</th>
        </tr>
        <tr>
            <td align="center">{{ $transaction->payment_method}}</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Produk</th>
            <th class="w-50">Deskripsi Produk</th>
            <th class="w-50">Quantity Product</th>
            <th class="w-50">Grand Total</th>
        </tr>
        <tr align="center">
            <td>Bricket Premium</td>
            <td>Bricket Premium ukuran 5 x 5 cm lonjong</td>
            <td>{{ $transaction->quantity_product }} <span>Kg</span></td>
            <td><span>Rp </span>{{ $transaction->total_amount }}</td>
        </tr>
        <tr>
            <td colspan="4">
                <div class="total-part">
                    <div class="total-left w-70 float-left" align="right">
                        <p>Tax (0%)</p>
                        <p>Total Payable</p>
                    </div>
                    <div class="total-right w-30 float-left text-bold" align="right">
                        <p>Rp. 0</p>
                        <p>Rp. {{ $transaction->total_amount }}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
    </table>

    <div class="signature mt-30" align="right">
        <p>Dengan Hormat,</p>
        <br>
        <br>
        <br>
        <p>Pabrik Bricket</p>
        <p>Finance Dept</p>

    </div>
</div>
</html>