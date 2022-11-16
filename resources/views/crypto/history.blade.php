@extends('layouts.app')

@section('title', 'Crytpo Dashboard')

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
            <br>
            <br>
          
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
    
       @if (!isset($data))
       
         <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                 {{ $error }}
                </div>
          </div>
                  
       @else
   
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Fee</th>
                <th scope="col">Total</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
               
             
                <th scope="col">Network</th>
                <th scope="col">Date</th>
               
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                
                
               
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td><span>{{ number_format($item->amount,2) }} -  {{$item->coin}}</span></td>
                        <td>{{ $item->transactionFee }} {{$item->coin}}</td>
                        <td>{{ number_format(floatval( $item->amount ) + floatval($item->transactionFee) )}} - {{$item->coin}}</td>
                        <td>{{  $item->address }}</td>
                     
                        <td>{{ $statusTrans[$item->status] }}</td>
                        
                        
                        
                        <td>{{$item->network}}</td>
                        <td> {{$item->applyTime }} </td>
                       
                        
                    <tr>
                   
                @endforeach
              
             
            </tbody>
          </table>

        
          @endif
       
    </div>
        

    

</div>
@endsection