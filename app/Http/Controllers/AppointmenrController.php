<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmenrController extends Controller
{
    public function store(Request $request)  {

        $validated = $request->validate([
            'id_seller' => 'required',
            'date' => 'required',
            'id_post' => 'required',
        ], [
            'date.required' => 'Ngày hẹn không được bỏ trống.',
        ]);
        
        try {

            Appointment::create([
                'id_seller' => $validated['id_seller'],
                'date' => $validated['date'],
                'id_post' => $validated['id_post'],
                'status' => false,
                'id_customer' => Auth::id(),
            ]);
            // Redirect with a success message
            return redirect()->back()->with('success', 'Đặt lịch thành công');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo đăng bài. Vui lòng thử lại!');
        }
    }

    public function appointment() {
        $appointments = Appointment::with(['customer', 'seller', 'post'])
        ->where('id_seller', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        return view('pages.user.appointment', compact('appointments'));
    }

    public function watched($id) {
        $appointments = Appointment::findOrFail($id);
        $appointments->status = true;
        $appointments->save();

        return redirect()->back()->with('success', 'Đã cập nhật');
    }
}
