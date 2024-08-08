<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    public function PieChart(Request $request)
    {
        return view('administrator.home-admin', compact('categories'));
    }
    public function indexAdd(Request $request)
    {
        return view('administrator.Produk.add-post');
    }

    public function IndexAdmin()
    {
        $product = Product::paginate(4);
        return view('administrator.Produk.home-admin', compact('product'));
    }

    public function HomeAdmin()
    {
        $categories = Product::select('kategori', DB::raw('count(*) as total'))
        ->groupBy('kategori')
        ->get();

        $totalProduct = Product::all()->count();
        $totalPaket = Paket::all()->count();
        $totalPendingin = Product::where('kategori', 'Pendingin')->count();
        $totalPenutup = Product::where('kategori', 'Penutup Ruangan')->count();
        $totalKursi = Product::where('kategori', 'Kursi dan Meja')->count();
        $totalKarpet = Product::where('kategori', 'Karpet')->count();
        $totalPanggung = Product::where('kategori', 'Panggung')->count();
        $totalVideotron = Product::where('kategori', 'Led Videotron')->count();
        $totalTenda = Product::where('kategori', 'Tenda')->count();
        $totalPengamanan = Product::where('kategori', 'Pengamanan')->count();
        $totalGenset = Product::where('kategori', 'Genset')->count();
        $totalSound = Product::where('kategori', 'Sound System')->count();

        return view('administrator.home-admin', compact('totalProduct', 'totalPaket',
    'categories', 'totalSound',
    'totalPendingin', 'totalPenutup', 'totalKursi',
    'totalKarpet','totalPanggung', 'totalVideotron',
    'totalTenda','totalPengamanan', 'totalGenset'));
    }

    public function EditAdmin($id)
    {
        $data = Product::find($id);
        return view('administrator.Produk.edit-post', compact('data'));
    }

    public function create(Request $request)
    {
        $addProject = new Product();
        $addProject->nama_product = $request->nama_product;
        $addProject->kategori = $request->kategori;
        $addProject->deskripsi = $request->deskripsi;
        $addProject->harga_sewa = $request->harga_sewa;

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('public/image', $request->file('gambar')->getClientOriginalName());
            $addProject->gambar = $request->file('gambar')->getClientOriginalName();
            }

        $addProject->save();
        return redirect('/home-produk')->with('success', 'Product Berhasil Diupload');
    }


    public function update(Request $request)
    {
        $editProduct = Product::findOrFail($request->id);
        $editProduct->nama_product = $request->nama_product;
        $editProduct->kategori = $request->kategori;
        $editProduct->deskripsi = $request->deskripsi;
        $editProduct->harga_sewa = $request->harga_sewa;

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('public/image', $request->file('gambar')->getClientOriginalName());
            $editProduct->gambar = $request->file('gambar')->getClientOriginalName();
            }

        $editProduct->save();

        return redirect('/home-produk')->with('update', 'Product Berhasil Diubah');
    }


    public function delete($id)
    {
        $dataDelete = Product::find($id);
        $dataDelete->delete();
        return redirect ('/home-produk')->with('delete', 'Produk Berhasil Dihapus');
    }
}
