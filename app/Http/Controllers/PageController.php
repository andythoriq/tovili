<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        if(auth()->check()){
            $productIdCount = count(Product::select('id')->where('diBeli', false)->where('user_id', auth()->user()->getAuthIdentifier())->get());
        }
        return view('home.home', [
            'stocks' => Stock::select(['nama', 'slug', 'gambar', 'harga', 'persediaan'])->paginate(6),
            'productIdCount' => $productIdCount ?? 0
        ]);
    }
    public function about() {
        return view('home.about');
    }
    public function gallery() {
        return view('home.gallery');
    }

}