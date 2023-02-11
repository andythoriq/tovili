<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        return view('stocks.add');
    }

    public function store(Request $request)
    {
        $validStock = $request->validate([
            'nama' => ['required', 'max:200', 'unique:stocks,nama'],
            'persediaan' => ['required', 'in:ada,habis'],
            'gambar' => 'image|file|max:1000|nullable|mimes:png,jpg,jpeg,avif,webp',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric'
        ]);
        $validStock['slug'] = Str::slug($request->nama);
        if($request->file('gambar')){
            $validStock['gambar'] = $request->file('gambar')->store('product-img');
        }
        Stock::create($validStock);
        return redirect(route('stock.index'))->with('success', "Data telah ditambahkan. Periksa Beranda -> " . "<a href='/'>di sini</a>" );
    }

    public function show(Stock $stock)
    {
        $stock = Stock::where('id', $stock->id)->where('slug', $stock->slug)->firstOrFail();
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        return view('stocks.edit', compact('stock'));
    }

    public function update(Request $request, Stock $stock)
    {
        function cekPerubahanNama($request, $stock){
            if ($request->nama == $stock->nama) {
                return '';
            }
            return 'unique:stocks,nama';
        }
        $validStock = $request->validate([
            'nama' => ['required', 'max:200', cekPerubahanNama($request, $stock)],
            'persediaan' => ['required', 'in:ada,habis'],
            'gambar' => 'image|file|max:1000|nullable|mimes:png,jpg,jpeg,avif,webp',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|'
        ]);
        $validStock['slug'] = Str::slug($request->nama);
        if($request->file('gambar')){
            if($stock->gambar){
                Storage::delete($stock->gambar);
            }
            $validStock['gambar'] = $request->file('gambar')->store('product-img');
        }
        Stock::where('id', $stock->id)->where('slug', $stock->slug)->update($validStock);
        return redirect(route('stock.index'))->with('success', "Data telah diubah. Periksa Beranda -> " . "<a href='/'>di sini</a>" );
    }

    public function destroy(Stock $stock)
    {
        if($stock->gambar){
            Storage::delete($stock->gambar);
        }
        Stock::destroy($stock->id);
        return redirect(route('stock.index'))->with('warning', "Data telah dihapus. Periksa Beranda -> " . "<a href='/'>di sini</a>" );
    }
}