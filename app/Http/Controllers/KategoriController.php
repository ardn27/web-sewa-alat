<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class KategoriController extends Controller
{
    public function Pendingin(Request $request)
    {
        $query = Product::where('kategori', 'Pendingin');
        $sortBy = $request->get('sort_by');

        if ($sortBy == '--filter--') {
            // Reset order by
        } elseif ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        }

        $products = $query->get();
        $totalCategory = $query->count();

        return view('kategori.pendingin', compact('products', 'totalCategory', 'sortBy'));
    }


    public function PenutupRuangan(Request $request)
    {

        $query = Product::where('kategori', 'Penutup Ruangan');
        $sortBy = $request->get('sort_by');
        if ($sortBy == '--filter--') {
            // Reset order by
        } elseif ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        }

        $products = $query->get();
        $totalCategory = Product::where('kategori', 'Penutup Ruangan')->count();
        return view('kategori.penutup-ruangan', compact('products', 'totalCategory',  'sortBy'));
    }

    public function KursiMeja(Request $request)
    {
        $query = Product::where('kategori', 'Kursi dan Meja');
        $sortBy = $request->get('sort_by');

        if ($sortBy == '--filter--') {
        } elseif ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        }
        $products = $query->get();
        $totalCategory = $query->count();

        return view('kategori.tempat-duduk', compact('products', 'totalCategory', 'sortBy'));
    }

    public function Karpet(Request $request)
    {
        $query = Product::where('kategori', 'Karpet');
        $sortBy = $request->get('sort_by');
        if ($sortBy == '--filter--') {
            // Reset order by
        } elseif ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        }
        $products = $query->get();
        $totalCategory = Product::where('kategori', 'Karpet')->count();
        return view('kategori.karpet', compact('products', 'totalCategory', 'sortBy'));
    }

    public function Panggung(Request $request)
    {
        $query = Product::where('kategori', 'Panggung');
        $sortBy = $request->get('sort_by');
        if ($sortBy == '--filter--') {
            // Reset order by
        } elseif ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        }

        $products = $query->get();
        $totalCategory = Product::where('kategori', 'Panggung')->count();
        return view('kategori.panggung', compact('products', 'totalCategory', 'sortBy'));
    }

    public function Videotron(Request $request)
    {
        $query = Product::where('kategori', 'Led Videotron');
        $sortBy = $request->get('sort_by');
        if ($sortBy == '--filter--') {
            // Reset order by
        } elseif ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        }
        $products = $query->get();
        $totalCategory = Product::where('kategori', 'Led Videotron')->count();
        return view('kategori.videotron', compact('products', 'totalCategory', 'sortBy'));
    }

    public function Tenda(Request $request)
    {
        $query = Product::where('kategori', 'Tenda');
        $sortBy = $request->get('sort_by');
        if ($sortBy == '--filter--') {
        } elseif ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        }

        $products = $query->get();
        $totalCategory = Product::where('kategori', 'Tenda')->count();
        return view('kategori.tenda', compact('products', 'totalCategory', 'sortBy'));
    }

    public function Pengamanan(Request $request)
    {
        $query = Product::where('kategori', 'Pengamanan');
        $sortBy = $request->get('sort_by');
        if ($sortBy == '--filter--') {
        } elseif ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        }
        $products = $query->get();
        $totalCategory = Product::where('kategori', 'Pengamanan')->count();
        return view('kategori.pengamanan', compact('products', 'totalCategory', 'sortBy'));
    }

    public function Genset(Request $request)
    {
        $query = Product::where('kategori', 'Genset');
        $sortBy = $request->get('sort_by');
        if ($sortBy == '--filter--') {
        } elseif ($sortBy == 'lowest_price') {
            $query->orderBy('harga_sewa', 'asc');
        } elseif ($sortBy == 'highest_price') {
            $query->orderBy('harga_sewa', 'desc');
        } elseif ($sortBy == 'a_z') {
            $query->orderBy('nama_product', 'asc');
        } elseif ($sortBy == 'z_a') {
            $query->orderBy('nama_product', 'desc');
        }

        $products = $query->get();
        $totalCategory = Product::where('kategori', 'Genset')->count();
        return view('kategori.genset', compact('products', 'totalCategory', 'sortBy'));
    }

}
