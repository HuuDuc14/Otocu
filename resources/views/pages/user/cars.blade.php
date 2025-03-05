@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cars</h1>
            <div class="d-flex justify-content-end">
                <a href="{{route('post.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Đăng
                    bài</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="shadow">
                    <div class="card-sl">
                        <form action="{{ route('cars')}}" method="get">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa điểm bán</label>
                                        <select name="province_id" id="province" class="form-control">
                                            <option value="">--Chọn tỉnh/ thành phố--</option>
                                            @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" 
                                                {{ request('province_id') == $province->id ? 'selected' : '' }}>
                                                {{ $province->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="district">Quận/ Huyện</label>
                                        <select name="district_id" id="district" class="form-control" disabled>
                                            <option value="">Chọn quận/ huyện</option>
                                            <!-- Quận sẽ được tải qua AJAX -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hãng xe</label>
                                        <select name="car_brand" id="car_brand" class="form-control">
                                            <option value="">--Chọn hãng xe--</option>
                                            @foreach ($brand_cars as $brand_car)
                                                <option value="{{ $brand_car->id }}"
                                                    {{ request('car_brand') == $brand_car->id ? 'selected' : '' }}>
                                                    {{ $brand_car->name_car_brand }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Khoảng giá:</br> 
                                            đ<span class="text-danger" id="min_price_value">
                                                {{ request('min_price', 300000000) }} 
                                            </span> -> 
                                            đ<span class="text-danger" id="max_price_value">
                                                {{ request('max_price', 3000000000) }}
                                            </span>
                                        </label>
                                        <div class="range-2-slider mt-2">
                                            <input class="range1" type="range" min="300000000" max="1000000000"
                                                step="100000000" name="min_price" id="min_price_range"
                                                value="{{ request('min_price', 300000000) }}">
                                
                                            <input class="range2" type="range" min="1000000000" max="3000000000"
                                                step="100000000" name="max_price" id="max_price_range"
                                                value="{{ request('max_price', 3000000000) }}">
                                        </div>
                                    </div>
                                </div>                                

                                <div class="col-lg-6">
                                    <a href="{{route('cars')}}" class="btn btn-info shadow-sm w-100 mt-4">Reset</a>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary shadow-sm w-100 mt-4">Lọc</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @if ($cars->isNotEmpty())
                   <div class="row">
                    @foreach ($cars as $car)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="shadow">
                                <div class="card-sl">
                                    <div class="card-image">
                                        <a href="{{ route('cars.detail', $car->id)}}"><img
                                                src="{{ asset('storage/' . $car->url_picture) }}" alt="Image" width="100%"></a>
                                    </div>
                                    <a class="card-action" href="{{route('save', $car->id)}}"><i
                                            class="fa-solid fa-bookmark"></i></a>
                                    <div class="card-heading">
                                        {{$car->carBrand->name_car_brand ?? 'N/A' }} | {{$car->title}}
                                    </div>
                                    <div class="card-text text-danger">
                                        đ {{number_format($car->price, 0, ',', '.')}}
                                    </div>
                                    <div class="card-text">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-calendar"></i>
                                                    <p class="my-0 mx-2">{{$car->year}}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-road"></i>
                                                    <p class="my-0 mx-2">{{$car->mileage}} km</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-sm-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <p class="my-0 mx-2">{{$car->district->name ?? 'N/A'}},
                                                        {{$car->province->name ?? 'N/A'}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 d-flex justify-content-center">
                                            <a href="{{ route('cars.detail', $car->id)}}"
                                                class="btn btn-primary shadow-sm w-100">Chi
                                                tiết</a>
                                        </div>
                                        <div class="col-sm-6 d-flex justify-content-center">
                                            <a href="https://zalo.me/{{ $car->user->phone_number }}" target="_blank"
                                                class="btn btn-success shadow-sm w-100">Liên hệ</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div> 
                @else
                    <h2 class="text-center">Không tìm thấy bài đăng nào</h2>
                @endif
                
            </div>
        </div>
    </div>


    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
        {{-- Xóa thông báo sau khi hiển thị (Chỉ để hiển thị 1 lần) --}}
        {{ session()->forget('success') }}
    @endif

@endsection