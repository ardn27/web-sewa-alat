<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Iklan;
use App\Models\PaketProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Paket;

class HomeController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('nama_product', 'like', '%' . $query . '%')->get()->unique('id');
        $resultsTotals = Product::where('nama_product', 'like', '%' . $query . '%')->count();
        $html = '';

        if ($results->isEmpty()||$query==null) {
             $html .= '<div class="dropdown-item">Tidak ada produk ditemukan</div>';
        } else {
            foreach ($results as $result) {
                $productLink = '/product/' . $result->id;
                $imageUrl = asset('public/image/' . $result->gambar); // Menghasilkan URL gambar
                $html .= '<a class="dropdown-item" href="' . $productLink . '">';
                $html .= '<img src="' . $imageUrl . '" alt="' . $result->nama_product . '" style="width:50px;height:50px;margin-right:10px;"> ';
                $html .= $result->nama_product . '</a>';
            }
        }

        if ($request->ajax()) {
            return response()->json(['html' => $html]);
        } else {
            return view('user-view/search_result', compact('results', 'resultsTotals'));
        }
    }

    public function Index(Request $request)
    {
        $products = Product::take(4)->get();
        $pakets = Paket::take(4)->get();
        $iklans = Iklan::take(3)->get();
        $paketProducts = PaketProduct::all();
        return view('layout/home', compact('products', 'pakets', 'iklans', 'paketProducts'));
    }
    public function AllProduct(Request $request)
    {
        $query = Product::query();
        $sortBy = $request->input('sort_by');

        if ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        } else {
            // Handle default case or no filter selected
        }

        $products = $query->get();
        $resultsTotals = $products->count();

        return view('user-view.all_product', compact('products', 'resultsTotals', 'sortBy'));
    }

    public function AllPaket(Request $request)
    {
        $query = Paket::query();
        $sortBy = $request->input('sort_by');

        if ($sortBy == 'lowest_price') {
            $query->orderBy('harga', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_paket', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_paket', 'desc');
        } else {
            // Handle default case or no filter selected
        }

        $pakets = $query->get();
        $resultsTotals = $pakets->count();
        $paketProducts = PaketProduct::all();

        return view('user-view.all_paket', compact('pakets', 'resultsTotals','paketProducts', 'sortBy'));
    }

    public function ProductById($id)
    {
        $products = Product::find($id);
        return view('user-view.detail', compact('products'));
    }

    public function PaketById($id)
    {
        $pakets = Paket::find($id);
        $paketProducts = Product::all();
        return view('user-view.detail_paket', compact('pakets', 'paketProducts'));
    }

}
