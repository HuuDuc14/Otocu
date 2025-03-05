@extends('index')
@section('content')

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Bài đăng</h6>
                    </div>
                    <div class="card-body">
                        <form class="load" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hãng xe<span class="text-danger">*</span></label>
                                        <select name="car_brand" id="car_brand" class="form-control">
                                            @foreach ($brand_cars as $brand_car)
                                                <option value="{{ $brand_car->id }}">{{ $brand_car->name_car_brand }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kiểu dáng<span class="text-danger">*</span></label>
                                        <select name="design_car" id="design_car" class="form-control">
                                            @foreach ($design_cars as $design_car)
                                                <option value="{{ $design_car->id }}">{{ $design_car->name_design_car}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá<span class="text-danger">*</span>: đ <span class="text-success" id="priceValue">{{ old('price', 300000000) }}</span></label>
                                        <input type="range" class="form-control" min="300000000" max="3000000000"
                                            step="100000000" name="price" value="{{ old('price') }}" id="priceRange">
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Địa điểm bán<span class="text-danger">*</span></label>
                                            <select name="province_id" id="province" class="form-control">
                                                <option selected>--Chọn tỉnh/ thành phố--</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="district">Quận/ Huyện<span class="text-danger">*</span></label>
                                            <select name="district_id" id="district" class="form-control" disabled>
                                                <option value="">Chọn quận/ huyện</option>
                                                <!-- Quận sẽ được tải qua AJAX -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="url_picture"
                                        value="{{old('url_picture')}}">
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Năm sản xuất<span class="text-danger">*</span></label>
                                            <select name="year" class="form-control" value="{{old('year')}}">
                                                @for ($i = 1990; $i <= $yearnow; $i++ )
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Đã đi<span class="text-danger">*</span>: <span class="text-danger" id="mileageValue">{{ old('mileage') }}</span> km</label>
                                                <input type="range" class="form-control" min="2000" max="20000"
                                            step="1000" name="mileage" value="{{ old('mileage') }}" id="mileageRange">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Màu xe<span class="text-danger">*</span></label>
                                            <select name="mau_xe" class='form-control'>
                                                <option value="Trắng">Trắng</option>
                                                <option value="Đen">Đen</option>
                                                <option value="Đỏ">Đỏ</option>
                                                <option value="Vàng">Vàng</option>
                                                <option value="Xanh Dương">Xanh Dương</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nhiên liệu<span class="text-danger">*</span></label>
                                            <select name="fuel_type" class='form-control'>
                                                <option value="xăng">Xăng</option>
                                                <option value="điện">Điện</option>
                                                <option value="dầu">Dầu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hộp số<span class="text-danger">*</span></label>
                                            <select name="gearbox" class='form-control'>
                                                <option value="số sàn">Số sàn</option>
                                                <option value="số tự động">Số tự động</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số chỗ ngồi<span class="text-danger">*</span></label>
                                                <select name="number_seats" class='form-control'>
                                                    <option value="2">2</option>
                                                    <option value="5">5</option>
                                                    <option value="7">7</option>
                                                    <option value="9">9</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-end">
                                    <div>
                                        <a href="{{ route('post.index')}}" class="btn btn-secondary">Hủy</a>
                                        <button type="submit" class="btn btn-success">Đăng bài</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        // Kiểm tra nếu có bất kỳ lỗi nào trong session
        @if ($errors->any())
            let errorMessages = '';

            // Duyệt qua tất cả các lỗi và nối chúng lại với nhau
            @foreach ($errors->all() as $error)
                errorMessages += '{{ $error }}\n';
            @endforeach

            // Hiển thị tất cả các lỗi bằng SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: errorMessages,
                showConfirmButton: false,
                timer: 5000
            });
        @endif
    </script>



@endsection