<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactionInput($slug) {
        $stock = Stock::select('nama', 'slug', 'harga')->where('slug', $slug)->first();
        return view('transaction.buy', compact('stock'));
    }
    public function transactionStore(Request $request, $slug) {
        $validProduct = $request->validate([
            'jumlah' => ['required', 'numeric', 'min:1'],
        ]);
        $stockId = Stock::select('id')->where('slug', $slug)->first()->id;
        $validProduct['stock_id'] = $stockId;
        $validProduct['user_id'] = auth()->user()->getAuthIdentifier();
        Product::create($validProduct);
        return redirect(route('home'))->with('success', 'Produk berhasil dimasukkan ke dalam <a href="/cart">keranjang</a>');
    }
    public function metodeBayar()
    {
        return view('transaction.metode');
    }
    public function pesananIndex()
    {
        return view('transaction.pesanan', ['products' => Product::where('diBeli', true)->where('terKirim', false)->orderBy('created_at', 'desc')->distinct()->get(['user_id'])]);
    }
    public function pesananDetail($user_id)
    {
        $products = Product::where('diBeli', true)->where('terKirim', false)->where('user_id', $user_id)->get();
        $user = User::where('id', $user_id)->first(['nama','alamat']);
        $productIdentifier = Product::where('user_id', $user_id)->where('diBeli', true)->first('user_id')->user_id;
        return view('transaction.detail', compact('products', 'user', 'productIdentifier'));
    }
    public function kirimPesanan($user_id)
    {
        Product::where('user_id', $user_id)->where('diBeli', true)->where('terKirim', false)->update(['terKirim' => true]);
        return redirect(route('pesananIndex'))->with('success', "barang telah diterima");
    }
}