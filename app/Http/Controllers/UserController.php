<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use App\Models\Post;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::where('role', 'user')
        ->orderBy('created_at', 'desc')
        ->withCount('posts')  // Lấy tổng số bài viết
        ->withCount(['posts as posts_approved_count' => function ($query) {
            $query->where('status', 'đã duyệt');  // Điều kiện chỉ đếm bài viết có status = 'đã duyệt'
        }])
        ->withCount(['posts as posts_refused_count' => function ($query) {
            $query->where('status', 'bị từ chối');  // Điều kiện chỉ đếm bài viết có status = 'đã duyệt'
        }])
        ->get();

        return view('pages.admin.user.index')->with('users', $users);
    }

    public function search(Request $request)
    {
        if ($request->input('search')) {
            $users = User::where(function ($query) use ($request) {
                $query->where('username', 'LIKE', '%' . $request->input('search') . '%')
                      ->orWhere('email', 'LIKE', '%' . $request->input('search') . '%');
            })->paginate(5);
        } else {
            $users = User::paginate(5);
        }
    
        return view('pages.admin.user.index')->with('users', $users);
    }

    public function delete($id)  {
        $user = User::findOrFail($id);
        Post::where('id_user', $id)->delete();
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Xóa người dùng thành công!');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        
        $status = Auth::attempt(['email' => $email, 'password' => $password]);

    
        if ($status) { 
            return redirect()->route('cars')->with('success', 'Đăng nhập thành công!');
        }

        return redirect()->back()->with('error', 'Tài khoản không đúng. Vui lòng thử lại!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('cars')->with('success', 'Đã đăng xuất!');;
    }

    public function makeStaff($id)
{
    $user = User::findOrFail($id);
    $user->role = 'staff';
    $user->save();

    return redirect()->back()->with('success', 'Người dùng đã được cập nhật thành nhân viên.');
}
}
