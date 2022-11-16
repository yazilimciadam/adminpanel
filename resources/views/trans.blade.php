
@extends('layouts.app')

@section('title', 'Merchant Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-3">Welcome To <strong>paybling.co</strong> {{ $title }}</h2>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
    
        <table id="tableId" width="100%" class="table table-bordered">

    <thead>
      <tr>
      <th scope="col"> ID</th>
          <th scope="col">Charge_id</th>
          <th scope="col">Amount</th>
          <th scope="col">Fee</th>
          <th scope="col">Amount Kalan</th>
          <th scope="col">Error Message</th>
          <th scope="col">Name</th>
          <th scope="col">Date</th>
          <th scope="col">EXCHANGE</th>



      </tr>
    </thead>
    <tbody>
        @foreach ($trans as $tran)
        <tr>
            <td>{{$tran->_id}}</td>
            <td>{{$tran->charge_id}}</td>
            <td>{{$tran->amount}}</td>
            <td>{{$tran->fee}}</td>
            <td>{{$tran->totalAmount}}</td>
            <td>{{isset($tran->error_message)?$tran->error_message:""}}</td>
            <td>{{ isset($tran->customer_info->customer_name)?$tran->customer_info->customer_name:""}}</td>
            <td>{{$tran->create_date}}</td>
            <td>{{isset($tran->exchange_rate)?$tran->exchange_rate:""}} - {{isset($tran->exchange_currency)?$tran->exchange_currency:""}}</td>
        </tr>
        @endforeach
    </tbody>
</table>


</div>




</div>
@endsection