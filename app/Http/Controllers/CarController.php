<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function showPostsCar() {
        $cars = Post::with(['carBrand', 'designCar', 'address', 'user'])
            ->where('status', 'đã duyệt')
            ->orderBy('created_at', 'desc')
            ->get(); // Lọc chỉ lấy bài post có status = 'chờ duyệt'
        return view('pages.user.cars', compact('cars'));
    }

    public function detailCar($id) {
        // dd($id);
        $car = Post::findOrFail($id);

        return view('pages.user.detailCar')->with('car', $car);
    }
}
