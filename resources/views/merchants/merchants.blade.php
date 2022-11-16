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
    
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">_id</th>
                  <th scope="col">Ad Soyad</th>
                  <th scope="col">Fee</th>
                  <th scope="col">Fee Yurtdışı</th>
                  <th scope="col">Country</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telefon</th>
                  <th scope="col">Default Currency</th>
                  
                  <th scope="col">IBAN & KYC Onayı</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($merchants as $merchant)
                <tr>
                  <td>{{$merchant->_id}}</td>
                  <td>{{$merchant->name}}</td>
                  <td>{{$merchant->fee->Tr->fee}}</td>
                  <td>{{$merchant->fee->nonTr->fee}}</td>
                  <td>{{$merchant->country}}</td>
                  <td>{{$merchant->mail}}</td>
                  <td>{{$merchant->phone}}</td>
                  <td>{{$merchant->userDefaultCurrency}}</td>
                  
                  <td>
                    <a href="{{ $data."UsersData/Vergi/".$merchant->_id }}.pdf">Vergi</a><br>
                    <a href="{{ $data."UsersData/Banka/".$merchant->_id }}.pdf">IBAN</a><br>
                    <a href="{{ $data."UsersData/TCKart/".$merchant->_id }}.pdf">KYC</a><br>
                  </td>
                </tr>
                @endforeach

              </tbody>
        </table>


    </div>
        

    

</div>
@endsection