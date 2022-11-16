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
        <div class="row" style="overflow:auto">
            <div class="col-md-12">


                <section class="contact-clean">
                    <form method="POST" action="{{route("createMerchantP")}}">
                        {{ csrf_field() }}
                        <h2 class="text-center">Firma Ekle</h2>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="merhcantName" placeholder="Ad Soyad" required="">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="merchantMail" placeholder="E-Posta" inputmode="email" autofocus="" required="">
                            </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="merchantPhone" placeholder="Telefon" required="" inputmode="tel">
                            </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="merchantWeb" placeholder="Web Site" required="" inputmode="url">
                            </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="dnsAddress" placeholder="DNS Site (https olmadan)" required="" inputmode="text">
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="individual">
                                <option value="1" selected="">Bireysel</option>
                                <option value="0">Kurumsal</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="Country">
                                <option value="TR" selected="">Türkiye</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="reference"
                                placeholder="Referans (optional)">
                            </div>
                        <div class="mb-3"></div>

                        <div class="mb-3"><button class="btn btn-primary" type="submit">Ekle </button></div>
                    </form>
                </section>

                <hr>








            </div>
        </div>


    </div>
@endsection
