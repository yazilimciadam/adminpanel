<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PayblingAPI extends Controller
{
    //
    
    public function Login(Request $request){
        //var_dump($request->all());
        //$request = json_decode(json_encode($_POST), FALSE);
        
        $baseURL = env('PAYBLING_BASE_URL');

        $response = Http::post('https://sandbox-app.paybling.co/admin/login', [
            'mail' => $request->email,
            'pass' => $request->password,
        ], [
            'Accept' => 'application/json',
        ]);
        $dataResponse = json_decode($response->body());
     
        if (isset($dataResponse->isSuccess) && $dataResponse->isSuccess == 1) {
            $getCache = Cache::get('token');
            if ($getCache == null) {
                Cache::put('token', $response->json()["data"]['token'], 600);
            }else{
                Cache::forget('token');
                Cache::put('token', $response->json()["data"]['token'], 600);
            }
            return redirect()->route('home');
           
        }else{
            return view('auth/login')->with(['error'=>$dataResponse->error]);
        }
        
    }

    public function MerchantPending (){
        $getCache = Cache::get('token');
        if ($getCache != null) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$getCache,
            ])->post('http://backend-alb-2025296736.us-east-2.elb.amazonaws.com/admin/getMerchants/All', 
            [
                'Accept' => 'application/json',
            ]);
            $dataResponse = json_decode($response->body());
            //dd($dataResponse);
            if(isset($dataResponse->isSuccess) && $dataResponse->isSuccess == 1){
                return view('merchants/merchants', ["title" => "Merchants", "data"=>$dataResponse->data->url, "merchants" => $dataResponse->data->merchant]);
            }else{
                return view('merchants/merchants', ["title"=>"Merchants"])->with('error', $dataResponse->message);
            }
            
        }else{
            
            return redirect()->route('login')->withInput()
            ->withErrors(array('message' => 'Login field is required.'));
        }
    }

    public function Transactions ($cat){
        $getCache = Cache::get('token');
        if ($getCache != null) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$getCache,
            ])->post('http://backend-alb-2025296736.us-east-2.elb.amazonaws.com/admin/listTrans/'.$cat, 
            [
                'Accept' => 'application/json',
            ]);
            $dataResponse = json_decode($response->body());
            //dd($dataResponse);
            if(isset($dataResponse->isSuccess) && $dataResponse->isSuccess == 1){
                return view('/trans', ["title" => "Merchants", "trans" => $dataResponse->data]);
            }else{
                return view('/trans', ["title"=>"Merchants"])->with('error', $dataResponse->message);
            }
            
        }else{
            
            return redirect()->route('login')->withInput()
            ->withErrors(array('message' => 'Login field is required.'));
        }
    }

    public function CreateMerchant (Request $request){
        $getCache = Cache::get('token');
        if ($getCache != null) {

            //dd(json_encode($request->all()));
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$getCache,
            ])->post('http://backend-alb-2025296736.us-east-2.elb.amazonaws.com/admin/newMerchant', [
                json_encode($request->all())
            ],
            [
                'Accept' => 'application/json',
            ]);
            $dataResponse = json_decode($response->body());
            dd($dataResponse);
            if(isset($dataResponse->isSuccess) && $dataResponse->isSuccess == 1){
                return view('/trans', ["title" => "Merchants", "trans" => $dataResponse->data]);
            }else{
                return view('/trans', ["title"=>"Merchants"])->with('error', $dataResponse->message);
            }
            
        }else{
            
            return redirect()->route('login')->withInput()
            ->withErrors(array('message' => 'Login field is required.'));
        }
    }

    public function Logout(){
        $getCache = Cache::get('token');
        if ($getCache != null) {
            Cache::forget('token');
            Cache::flush();
        }
        return redirect()->route('login');
    }


    

}
