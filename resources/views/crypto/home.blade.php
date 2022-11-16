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
            <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#transferModal">
                <i class="fal fa-exchange"></i>
                <span>Create Transfer</span>
            </a>
            <br>
            <br>
        </div>
    </div>

    <div class="row">
        <table id="table" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Coin</th>
                <th scope="col">Balance</th>
              
               
    
               
              </tr>
            </thead>
            <tbody>
              
                @foreach ($balance as $item)
                
               
               
               
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$item["coin"]}}</td>
                       
                        <td><span>{{ number_format($item["balance"],2) }}</span></td>
                        
                       
                        
                    <tr>
                    
                @endforeach
              
             
            </tbody>
          </table>

    </div>
<hr>
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
                <th scope="col">Payment Method</th>
                <th scope="col">Status</th>
                <th scope="col">Fiat Currency</th>
                <th scope="col">Date</th>
               
              </tr>
            </thead>
            <tbody>
              
                @foreach ($data as $item)
                
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td><span>{{ number_format($item->amount,2) }} $</span></td>
                        <td>{{ $item->paymentMethod }}</td>
                        <td>{{ $item->orderStatus }}</td>
                        <td>{{ $item->fiatCurrency }}</td>
                        <td> {{ date('d/m/Y H:i:s', ($item->createTime/1000)) }} </td>
                       
                        
                    <tr>
                   
                @endforeach
              
             
            </tbody>
          </table>

        
          @endif
       
    </div>
        



</div>
@endsection

