<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;

class noteController extends Controller
{
    public function deleteNote(Request $request){
        $id = $request->id;
        $token = Cookie::get('token');
        $url = 'note-taking.my.id/public/note/delete/'.$id;
        $request = Http::withHeaders([
            'token' => $token
        ])->delete($url);
        if($request){
            return $request;
        }
    }

    public function updateNote(Request $request){
        $id = $request->id;
    }
}
