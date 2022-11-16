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
   
       
        
          @endif
       
    </div>
        

    

</div>
@endsection