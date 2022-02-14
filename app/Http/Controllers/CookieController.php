<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CookieController extends Controller
{
    public function setCookie(Request $request)
    {
        $minutes = 1;
        $response =  new Response("hello farah");

        /* in this option the cookie will still alife for onle one minute */
        $response->withCookie(cookie('name', 'farah', $minutes));

        /* in this option the cookie will still alife forever */
        //$response->withCookie(cookie()->forever('name', 'value'));

        return $response;
    }
    public function getCookie(Request $request)
    {
        $value = $request->cookie('name');
        echo $value;
    }
}
