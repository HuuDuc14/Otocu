<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function index()
    {
        $users = User::paginate(1);
        return view('pages.nhanvien.index')->with('users', $users);
    }

    public function search(Request $request)
    {
        if ($request->input('search')) {
            $users = User::where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->input('search') . '%')
                      ->orWhere('email', 'LIKE', '%' . $request->input('search') . '%');
            })->paginate(1);
        } else {
            $users = User::paginate(1);
        }
    
        return view('pages.nhanvien.index')->with('users', $users);
    }
    


    public function create()
    {
        return view('pages.nhanvien.create');
    }

    public function store(Request $request)
    {

        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ], [
            'name.required' => 'Tên không được bỏ trống.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email không được bỏ trống.',
            'email.email' => 'Email phải có định dạng hợp lệ.',
            'email.unique' => 'Email đã được sử dụng. Vui lòng chọn một email khác.'
        ]);
        // dd('vhaj');
        try {

            // Create the user
            $a = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => 'password', // Hash the password
            ]);

            // Redirect with a success message
            return redirect()->route('nhanvien.index')->with('success', 'Người dùng được tạo thành công!');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo người dùng. Vui lòng thử lại!');
        }
    }

    public function edit($id) {
        // dd($id);
        $user = User::findOrFail($id);
        // dd($user);

        return view('pages.nhanvien.edit')->with('user', $user);
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ], [
            'name.required' => 'Tên không được bỏ trống.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email không được bỏ trống.',
            'email.email' => 'Email phải có định dạng hợp lệ.',
        ]);
        // dd('vhaj');
        try {
            $user = User::findOrFail($request->input('id'));
   
            // Create the user
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => 'password', // Hash the password
            ]);
            // Redirect with a success message
            return redirect()->route('nhanvien.index')->with('success', 'Người dùng được tạo thành công!');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo người dùng. Vui lòng thử lại!');
        }
    }

}
