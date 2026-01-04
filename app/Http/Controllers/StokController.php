<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Product;
use App\Models\Toko;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stoks = Stok::with(['product', 'toko'])->get();
        return view('stoks.index', compact('stoks'));
    }

    public function create()
    {
        $products = Product::all();
        $tokos = Toko::where('aktif', true)->get();
        return view('stoks.create', compact('products', 'tokos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'toko_id' => 'required|exists:tokos,id',
            'jumlah' => 'required|integer|min:0',
            'stok_minimum' => 'nullable|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // Check if stok already exists for this product-toko combination
        $existingStok = Stok::where('product_id', $request->product_id)
            ->where('toko_id', $request->toko_id)
            ->first();

        if ($existingStok) {
            return redirect()->back()->withErrors(['error' => 'Stok untuk produk ini di toko tersebut sudah ada!'])->withInput();
        }

        Stok::create($request->all());
        return redirect()->route('stoks.index')->with('success', 'Stok berhasil ditambahkan!');
    }

    public function show(Stok $stok)
    {
        $stok->load(['product', 'toko']);
        return view('stoks.show', compact('stok'));
    }

    public function edit(Stok $stok)
    {
        $products = Product::all();
        $tokos = Toko::where('aktif', true)->get();
        return view('stoks.edit', compact('stok', 'products', 'tokos'));
    }

    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'toko_id' => 'required|exists:tokos,id',
            'jumlah' => 'required|integer|min:0',
            'stok_minimum' => 'nullable|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // Check if stok already exists for this product-toko combination (excluding current)
        $existingStok = Stok::where('product_id', $request->product_id)
            ->where('toko_id', $request->toko_id)
            ->where('id', '!=', $stok->id)
            ->first();

        if ($existingStok) {
            return redirect()->back()->withErrors(['error' => 'Stok untuk produk ini di toko tersebut sudah ada!'])->withInput();
        }

        $stok->update($request->all());
        return redirect()->route('stoks.index')->with('success', 'Stok berhasil diperbarui!');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stoks.index')->with('success', 'Stok berhasil dihapus!');
    }

    // Method untuk menambah stok
    public function tambahStok(Request $request, Stok $stok)
    {
        $request->validate([
            'jumlah_tambah' => 'required|integer|min:1',
        ]);

        $stok->jumlah += $request->jumlah_tambah;
        $stok->save();

        return redirect()->back()->with('success', 'Stok berhasil ditambah!');
    }

    // Method untuk mengurangi stok
    public function kurangStok(Request $request, Stok $stok)
    {
        $request->validate([
            'jumlah_kurang' => 'required|integer|min:1',
        ]);

        if ($stok->jumlah < $request->jumlah_kurang) {
            return redirect()->back()->withErrors(['error' => 'Jumlah stok tidak mencukupi!']);
        }

        $stok->jumlah -= $request->jumlah_kurang;
        $stok->save();

        return redirect()->back()->with('success', 'Stok berhasil dikurangi!');
    }
}
