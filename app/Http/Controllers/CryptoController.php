<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CryptoController extends Controller
{
    //
    public function getBalance(){
        $getCache = Cache::get('token');
        if ($getCache != null) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$getCache,
            ])->post('https://sandbox-app.paybling.co/admin/binance', [
                'type' => 'getHistory',
            ], [
                'Accept' => 'application/json',
            ]);
            $dataResponse = json_decode($response->body());
            $balanceResponse  = Http::withHeaders([
                'Authorization' => 'Bearer '.$getCache,
            ])->post('https://sandbox-app.paybling.co/admin/binance', [
                'type' => 'getBalance',
            ], [
                'Accept' => 'application/json',
            ]);
            $balanceData = json_decode($balanceResponse->body(),true);
            //dd($balanceData["data"]);
            $array = [];
            foreach ($balanceData['data'] as $key => $value) {
                if(floatval($value["available"]) > 0){
                    array_push($array, ["coin"=>$key,"balance"=>$value['available']]);
                }
                
            }
           
            if(isset($dataResponse->isSuccess) && $dataResponse->isSuccess == 1){
                return view('crypto/home', ["title" => "Crypto", "data" => $dataResponse->data->assetLogRecordList, "balance" => $array]);
            }else{
                return view('crypto/home', ["title"=>"Crypto"])->with('error', $dataResponse->message);
            }
            
        }else{
            
            return redirect()->route('login')->withInput()
            ->withErrors(array('message' => 'Login field is required.'));
        }
    }

    
    public function transfer (Request $request){

        $getCache = Cache::get('token');
        if ($getCache != null) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$getCache,
            ])->post('https://sandbox-app.paybling.co/admin/binance', [
                'type' => 'transfer',
                "coin"=>$request->coin,
                "quantity"=>$request->quantity,
                "network"=>$request->network,
                "address"=>$request->address,
            ], [
                'Accept' => 'application/json',
            ]);
            $dataResponse = json_decode($response->body());
            dd($dataResponse);
            if(isset($dataResponse->isSuccess) && $dataResponse->isSuccess == 1){
                return view('crypto/home', ["title" => "Crypto", "data" => $dataResponse->data]);
            }else{
                return view('crypto/home', ["title"=>"Crypto"])->with('error', $dataResponse->message);
            }
            
        }else{
            
            return redirect()->route('login')->withInput()
            ->withErrors(array('message' => 'Login field is required.'));
        }

    }

    public function getWithdrawHistory (){
        $getCache = Cache::get('token');
        if ($getCache != null) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$getCache,
            ])->post('https://sandbox-app.paybling.co/admin/binance', [
                'type' => 'withdrawHistory',
            ], [
                'Accept' => 'application/json',
            ]);
            $dataResponse = json_decode($response->body());
            //dd($dataResponse);
            $statusTrans = array("0"=> "email sent", "1"=>"canceled", "2"=> "awaiting approval", "3"=>"rejected", "4"=> "processing", "5"=> "failure", "6"=> "completed");
           

            if(isset($dataResponse->isSuccess) && $dataResponse->isSuccess == 1){
                return view('crypto/history', ["title" => "Crypto", "data" => $dataResponse->data, "statusTrans" => $statusTrans]);
            }else{
                return view('crypto/history', ["title"=>"Crypto"])->with('error', $dataResponse->message);
            }
            
        }else{
            
            return redirect()->route('login')->withInput()
            ->withErrors(array('message' => 'Login field is required.'));
        }
    }

}
