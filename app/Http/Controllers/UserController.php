<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mat_khau' => 'required|string|min:6',
        ]);

        $nguoiDung = NguoiDung::where('email', $request->email)->first();

        if ($nguoiDung && Hash::check($request->mat_khau, $nguoiDung->mat_khau)) {
            session([
                'nguoi_dung_id' => $nguoiDung->id_nguoi_dung,
                'ten_nguoi_dung' => $nguoiDung->ten_nguoi_dung,
                'email' => $nguoiDung->email,
            ]);

            return redirect()->route('home');
        }


        return back();
    }


    public function showRegisterForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'ten_nguoi_dung' => 'required|string|max:255',
            'email' => 'required|email|unique:nguoi_dung,email',
            'so_dien_thoai' => 'required|numeric|digits:10',
            'mat_khau' => 'required|string|min:6|', 
            'mat_khau_confirmation' => 'required|same:mat_khau',
        ]);


        $nguoiDung = new NguoiDung();
        $nguoiDung->ten_nguoi_dung = $request->ten_nguoi_dung;
        $nguoiDung->email = $request->email;
        $nguoiDung->so_dien_thoai = $request->so_dien_thoai;
        $nguoiDung->mat_khau = Hash::make($request->mat_khau); // Mã hóa mật khẩu


        $nguoiDung->save();

        return redirect()->route('login');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }
}
