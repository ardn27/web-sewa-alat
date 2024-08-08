<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iklan;

class IklanController extends Controller
{

    public function AddIklan(Request $request)
    {
        return view('administrator.Iklan.add-iklan');
    }

    public function UserIklan()
    {
        $iklan = Iklan::all();
        return view('layout.home', compact('iklan'));
    }

    public function IndexIklan()
    {
        $datas = Iklan::all();
        return view('administrator.Iklan.home-iklan', compact('datas'));
    }

    public function EditIklan($id)
    {
        $data = Iklan::find($id);
        return view('administrator.Iklan.edit-iklan', compact('data'));
    }

    public function createIklan(Request $request)
    {
        $addIklan = new Iklan();
        $addIklan->judul_iklan = $request->judul_iklan;
        $addIklan->link_produk = $request->link_produk;

        if ($request->hasFile('gambar_iklan')) {
            $request->file('gambar_iklan')->move('public/image', $request->file('gambar_iklan')->getClientOriginalName());
            $addIklan->gambar_iklan = $request->file('gambar_iklan')->getClientOriginalName();
            }

        $addIklan->save();

        return redirect('/home-iklan')->with('success', 'Iklan Berhasil Diupload');
    }

    public function updateIklan(Request $request)
    {
        $editIklan = Iklan::findOrFail($request->id);
        $editIklan->judul_iklan = $request->judul_iklan;
        $editIklan->link_produk = $request->link_produk;

        if ($request->hasFile('gambar_iklan')) {
            $request->file('gambar_iklan')->move('public/image', $request->file('gambar_iklan')->getClientOriginalName());
            $editIklan->gambar_iklan = $request->file('gambar_iklan')->getClientOriginalName();
            }

        $editIklan->save();

        return redirect('/home-iklan')->with('update', 'Iklan Berhasil Diupdate');
    }
    public function deleteIklan($id)
    {
        $dataDelete = Iklan::find($id);
        $dataDelete->delete();
        return redirect ('/home-iklan')->with('delete', 'Iklan Berhasil terhapus');
    }
}
