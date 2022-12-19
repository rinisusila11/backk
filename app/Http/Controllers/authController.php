<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;


class authController extends Controller
{
    public function actionlogin(Request $request){
        if(!$request){
            return "data belum masuk";
        }

        $response = Http::post('note-taking.my.id/public/auth/login',[
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => $request->password
        ]);

        if($response){
            $hasil = json_decode($response);

            //make cookies
            // return $hasil;
            Cookie::queue('token',$hasil->token,120);
            $get = Cookie::get('token');
            return view ('home');
        }

        return "maaf gagal login";
    }

    public function actionregister(Request $request){
        if(!$request){
            return "data belum masuk";
        }

        $response = Http::post('note-taking.my.id/public/auth/register',[
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => $request->password
        ]);

        $hasil = json_decode($response);

        if($hasil->success){
            // return $hasil;
            return view('login');
        }

        return "maaf gagal register";
    }
}
