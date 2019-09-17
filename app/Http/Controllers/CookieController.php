<?php

namespace App\Http\Controllers;

use App\Product;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

class CookieController extends Controller
{
    public function setCookie(Request $request) {
        $id = $request->get('id');

        $response = new Response('Product saved');
        $response->withCookie(cookie()->forever('saved_product', $id));
        return $response;
    }
    public function getCookie(Request $request) {
        $value = $request->cookie('saved_product');

        $product = Product::firstOrFail($value);

        echo $product;
    }
}
