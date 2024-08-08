<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Product;
use App\Models\PaketProduct;

class PaketController extends Controller
{
    public function HomePaket()
    {
        $paket = Paket::paginate(3);
        $productPaket = PaketProduct::all();
        return view('administrator.Paket.home-paket', compact('paket', 'productPaket'));
    }


    public function AddPaket(Request $request)
    {
        $products = Product::all();
        return view('administrator.Paket.add-paket', compact('products'));
    }

    public function EditPaket($id)
    {
        $data = Paket::find($id);
        $products = Product::all();
        // $allProducts = PaketProduct::all(); // Ambil semua produk yang tersedia
        // $selectedProducts = $data->id_products->pluck('id')->toArray(); // Ambil produk yang terkait dengan paket

        return view('administrator.Paket.edit-paket', compact('data', 'products'));
    }



    public function create(Request $request)
    {
        $addPackage = new Paket();
        $addPackage->nama_paket = $request->nama_paket;
        $addPackage->gambar_paket = $request->gambar_paket;
        $addPackage->deskripsi = $request->deskripsi;
        $addPackage->harga = $request->harga;

        if ($request->hasFile('gambar_paket')) {
            $request->file('gambar_paket')->move('public/image', $request->file('gambar_paket')->getClientOriginalName());
            $addPackage->gambar_paket = $request->file('gambar_paket')->getClientOriginalName();
        }

        $addPackage->save();

        foreach ($request->products as $product) {
            $addProduct = new PaketProduct();
            $addProduct->paket_id = Paket::latest()->first()->id;
            $addProduct->product_id = $product;
            $addProduct->save();
        }

        return redirect('/home-paket')->with('success', 'Paket Berhasil Diupload');
    }


    public function update(Request $request)
    {
        $editProduct = Paket::findOrFail($request->id);
        $editProduct->nama_paket = $request->nama_paket;
        $editProduct->deskripsi = $request->deskripsi;
        $editProduct->harga = $request->harga;

        if ($request->hasFile('gambar_paket')) {
            $request->file('gambar_paket')->move('public/image', $request->file('gambar_paket')->getClientOriginalName());
            $editProduct->gambar_paket = $request->file('gambar_paket')->getClientOriginalName();
        }

        $editProduct->save();

        // Menghapus produk terkait yang ada sebelumnya
        PaketProduct::where('paket_id', $editProduct->id)->delete();

        // Menambahkan produk baru
        foreach ($request->products as $product) {
            $addProduct = new PaketProduct();
            $addProduct->paket_id = $editProduct->id;
            $addProduct->product_id = $product;
            $addProduct->save();
        }

        return redirect('/home-paket')->with('success', 'Paket Berhasil Diubah');
    }


    public function delete($id)
    {
        $dataDelete = Paket::find($id);
        $dataDelete->delete();
        return redirect('/home-paket')->with('delete', 'Paket Berbasil Dihapus');
    }
}
