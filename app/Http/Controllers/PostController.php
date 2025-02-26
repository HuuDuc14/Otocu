<?php

namespace App\Http\Controllers;

use App\Models\BrandCar;
use App\Models\DesignCar;
use App\Models\Post;
use App\Models\SavePost;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Kjmtrue\VietnamZone\Models\District;
use Kjmtrue\VietnamZone\Models\Province;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['carBrand', 'designCar', 'province', 'district', 'user'])
            ->where('status', 'chờ duyệt') // Lọc chỉ lấy bài post có status = 'chờ duyệt'
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $flag = true; // để phân biệt trang index với accepted
        return view('pages.admin.post.index', compact('posts', 'flag'));
    }

    public function getDistricts($provinceId)
    {
        $districts = District::whereProvinceId($provinceId)->pluck('name', 'id');
        return response()->json($districts);
    }

    public function create()
    {
        if(Auth::check()){
            $provinces = Province::all();
            $brand_cars = BrandCar::all();
            $design_cars = DesignCar::all();
            $yearnow = now()->year;
    
            return view('pages.admin.post.create', compact('yearnow','provinces', 'brand_cars', 'design_cars'));
        }

        return redirect()->route('login');
       
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'car_brand' => 'required',
            'design_car' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'fuel_type' => 'required',
            'gearbox' => 'required',
            'url_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validate ảnh
            'price' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'mau_xe' => 'required',
            'number_seats' => 'required',
        ], [
            'title.required' => 'Title không được bỏ trống.',
            'url_picture.required' => 'Đường dẫn ảnh không được bỏ trống.',
            'price.required' => 'Giá không được bỏ trống.',
            'year.required' => 'Năm không được bỏ trống.',
            'mileage.required' => 'Số km đã đi không được bỏ trống.',
            'mau_xe.required' => 'Màu xe không được bỏ trống.',
            'number_seats.required' => 'Số chỗ ngồi không được bỏ trống.',
            'district_id.required' => 'Màu xe không được bỏ trống.',
            'province_id.required' => 'Số chỗ ngồi không được bỏ trống.',
        ]);

        try {
            $imagePath = null; // Định nghĩa trước để tránh lỗi undefined variable
            if ($request->hasFile('url_picture')) {
                $image = $request->file('url_picture');
                $imagePath = $image->store('images', 'public');
            }

            $post = Post::create([
                'title' => $validated['title'],
                'id_car_brand' => $validated['car_brand'],
                'id_design_car' => $validated['design_car'],
                'province_id' => $validated['province_id'],
                'district_id' => $validated['district_id'],
                'fuel_type' => $validated['fuel_type'],
                'gearbox' => $validated['gearbox'],
                'url_picture' => $imagePath,
                'price' => $validated['price'],
                'year' => $validated['year'],
                'mileage' => $validated['mileage'],
                'mau_xe' => $validated['mau_xe'],
                'number_seats' => (int) $validated['number_seats'],
                'status' => 'chờ duyệt',
                'id_user' => Auth::id(),
            ]);



            // Redirect with a success message
            return redirect()->route('mypost')->with('success', 'Đăng bài thành công!');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo đăng bài. Vui lòng thử lại!');
        }
    }

    public function accept($id)
    {

        $post = Post::findOrFail($id);
        $post->status = 'đã duyệt';
        $post->save();

        return redirect()->back()->with('success', 'Bài post đã được duyệt!');
    }

    public function refuse($id)
    {

        $post = Post::findOrFail($id);
        $post->status = 'bị từ chối';
        $post->save();

        return redirect()->back()->with('success', 'Bài post đã bị từ chối!');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        SavePost::where('id_post', $id)->delete();

        $post->delete();
        return redirect()->back()->with('success', 'Bài post đã bị xóa!');
    }

    public function accepted()
    {
        $posts = Post::with(['carBrand', 'designCar', 'province', 'district', 'user'])
            ->where('status', 'đã duyệt') // Lọc chỉ lấy bài post có status = 'chờ duyệt'
            ->paginate(5);
        $flag = false;
        return view('pages.admin.post.index', compact('posts', 'flag'));
    }

    public function refused()
    {
        $posts = Post::with(['carBrand', 'designCar', 'province', 'district', 'user'])
            ->where('status', 'bị từ chối') // Lọc chỉ lấy bài post có status = 'chờ duyệt'
            ->paginate(5);

        $flag = false;
        return view('pages.admin.post.index', compact('posts', 'flag'));
    }

    public function search(Request $request)
    {
        $flag = true;
        if ($request->input('search')) {
            $posts = Post::where(function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->input('search') . '%');
            })->paginate(5);
        } else {
            $posts = Post::paginate(5);
        }
    
        return view('pages.admin.post.index', compact('posts', 'flag'));
    }

    public function edit($id) {

        $post = Post::with(['carBrand', 'designCar', 'province', 'district', 'user'])
                ->findOrFail($id);

        $brand_cars = BrandCar::all();
        $design_cars = DesignCar::all();
        $provinces = Province::all();
        $districts = District::all();
        $yearnow = now()->year;

        return view('pages.user.edit-post', compact('yearnow','post', 'brand_cars', 'design_cars', 'provinces', 'districts'));
    }

    public function update(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'car_brand' => 'required',
            'design_car' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'fuel_type' => 'required',
            'gearbox' => 'required',
            'url_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validate ảnh
            'price' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'mau_xe' => 'required',
            'number_seats' => 'required',
        ], [
            'title.required' => 'Title không được bỏ trống.',
            'url_picture.required' => 'Đường dẫn ảnh không được bỏ trống.',
            'price.required' => 'Giá không được bỏ trống.',
            'year.required' => 'Năm không được bỏ trống.',
            'mileage.required' => 'Số km đã đi không được bỏ trống.',
            'mau_xe.required' => 'Màu xe không được bỏ trống.',
            'number_seats.required' => 'Số chỗ ngồi không được bỏ trống.',
            'province_id.required' => 'Địa điểm bán không được bỏ trống.',
            'district_id.required' => 'Địa điểm bán không được bỏ trống.',
        ]);
        // dd('vhaj');
        try {
            $imagePath = null; // Định nghĩa trước để tránh lỗi undefined variable
            if ($request->hasFile('url_picture')) {
                $image = $request->file('url_picture');
                $imagePath = $image->store('images', 'public');
            }

            $post = Post::findOrFail($request->input('id'));
   
            // Create the staff
            $post->update([
                'title' => $validated['title'],
                'id_car_brand' => $validated['car_brand'],
                'id_design_car' => $validated['design_car'],
                'province_id' => $validated['province_id'],
                'district_id' => $validated['district_id'],
                'fuel_type' => $validated['fuel_type'],
                'gearbox' => $validated['gearbox'],
                'url_picture' => $imagePath,
                'price' => $validated['price'],
                'year' => $validated['year'],
                'mileage' => $validated['mileage'],
                'mau_xe' => $validated['mau_xe'],
                'number_seats' => $validated['number_seats'],
                'status' => 'chờ duyệt',
            ]);
            // Redirect with a success message
            return redirect()->route('mypost')->with('success', 'Sửa bài đăng thành công!');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back();
        }
    }
}
