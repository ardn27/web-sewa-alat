<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view ('administrator.loginRegister.admin-login');
    }

    public function register()
    {
        return view ('administrator.loginRegister.admin-register');
    }

    public function registerAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],[
            'name.required' => 'nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
            'email.unique'=> 'email sudah digunakan',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        if($validator->fails())
        {
            return redirect('/admin-regis')
            ->withErrors($validator)
            ->withInput();
        }

        // Membuat pengguna baru
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
        ];

        if ($user = User::create($data)) {
            session()->flash('regis-success', 'Registrasi Berhasil, Silahkan login menggunakan email dan password');
            return redirect('/admin-regis');
        } else {
            session()->flash('error', 'Registrasi Gagal, Silakan coba lagi');
            return redirect()->back();
        }
    }

    public function loginAction(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home-admin');
        } else {
            return redirect()->back()->with('error', 'Email atau Password Salah');
        }
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        session()->regenerate();
        return redirect('/administrator');
    }
}
