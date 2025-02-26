<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\Post;
use App\Models\SavePost;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Str;
use function Termwind\render;

class HomeController extends Controller
{
    public function showPageHome()
    {
        return view('pages.user.dashboard');
    }
    public function showRegisterForm()
    {
        return view('pages.user.register');
    }

    public function registerStore(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'phone_number' => 'required|numeric|digits:10',
            'password' => 'required|string|min:6|',
            'confirm_password' => 'required|same:password',
        ], [
            'username.required' => 'Tên không được bỏ trống.',
            'email.unique' => 'Email đã được sử dụng. Vui lòng chọn một email khác.',
            'password.min' => 'Mật khẩu phải từ 6 ký tự.',
            'confirm_password.same' => 'Mật khẩu không trùng khớp.',
        ]);

        // Tạo mã xác thực ngẫu nhiên
        $verificationCode = Str::random(32);

       // Gửi email xác thực
        Mail::to($validated['email'])->send(new VerificationMail(
            $validated['username'],
            $validated['email'],
            $validated['phone_number'],
            $validated['password'],
            $verificationCode
        )); 

        return view('emails.wait-register')->with('success', 'Vui lòng kiểm tra email để xác thực tài khoản!');
    }
    //Hàm xác thực email
    public function verifyEmail(Request $request)
    {
        $username = $request->query('username');
        $email = $request->query('email');
        $code = $request->query('code');
        $phone_number = $request->query('phone_number');
        $password = $request->query('password');

        // Kiểm tra tính hợp lệ
        if (!$email || !$code || !$phone_number || !$password) {
            return redirect()->route('register')->with('error', 'Mã xác thực không hợp lệ.');
        }

        // Tạo tài khoản sau khi xác thực
        $user = User::create([
            'username' => $username,
            'email' => $email,
            'phone_number' => $phone_number,
            'password' => Hash::make($password), 
            'role' => 'user'
        ]);

        Auth::login($user);

        return redirect()->route('cars')->with('success', 'Xác thực thành công! Bạn có thể đăng nhập.');
    }

    public function showLoginForm()
    {
        return view('pages.user.login');
    }

    public function save($id)
    {
        try {
            // Create the user
            SavePost::create([
                'id_post' => $id,
                'id_user' => Auth::id(),
            ]);

            // Redirect with a success message
            return redirect()->route('cars')->with('success', 'Đã lưu bài viết vào mục xem sau');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi lưu bài viết. Vui lòng thử lại!');
        }
    }

    public function showPageSave()
    {
        $cars = SavePost::with(['post.user', 'post.carBrand', 'post.designCar'])
            ->where('id_user', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.user.save-post', compact('cars'));
    }

    public function deleteSave($id)
    {
        // $car = SavePost::findOrFail($id);
        // $car->delete();

        $car = SavePost::where('id_post', $id)
            ->where('id_user', Auth::id()) 
            ->firstOrFail(); // Lấy 1 bản ghi hoặc báo lỗi 404 nếu không tìm thấy

        $car->delete(); // Xóa bản ghi
        return redirect()->route('save.index');
    }

    public function myPost()
    {
        $posts = Post::with(['province', 'district', 'carBrand', 'designCar'])
            ->where('id_user', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.user.my-post', compact('posts'));
    }
}
