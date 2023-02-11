<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartIndex()
    {
        return view('cart.cart', [
            'products' => Product::where('user_id', auth()->user()->getAuthIdentifier())->where('diBeli', false)->orderBy('created_at', 'desc')->get(),
            'alamat' => User::where('id', auth()->user()->getAuthIdentifier())->first('alamat')->alamat,
            'productIdentifier' => auth()->user()->getAuthIdentifier(),
            'productIdCount' => count(Product::select('id')->where('diBeli', false)->where('user_id', auth()->user()->getAuthIdentifier())->get())
        ]);
    }
    public function cartDestroy($productId)
    {
        Product::destroy($productId);
        return redirect(route('cartIndex'))->with('warning', "Data telah dihapus dari keranjang." );
    }
    public function cartStore($user_id)
    {
        if($user_id != auth()->user()->getAuthIdentifier()){
            abort(403);
        }
        Product::where('user_id', $user_id)->where('diBeli', false)->update(['diBeli' => true]);
        return redirect(route('home'))->with('success', "Semua data telah dikirim ke toko." );
    }
    public function cartHistory()
    {
        return view('cart.history', ['products' => Product::where('user_id', auth()->user()->getAuthIdentifier())->where('diBeli', true)->orderBy('updated_at', 'desc')->get()]);
    }
}