@extends('index')
@section('content')

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sửa bài đăng</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('post.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" hidden class="form-control" name="id" value="{{$post->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" class="form-control" name="title" value="{{ $post->title}}">
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hãng xe</label>
                                        <select name="car_brand" id="car_brand" class="form-control">
                                            @foreach ($brand_cars as $brand_car)
                                                {{-- <option value="{{ $brand_car->id }}">{{ $brand_car->name_car_brand }}</option> --}}
                                                <option value="{{ $brand_car->id }}" {{ $brand_car->id == $post->id_car_brand ? 'selected' : '' }}>
                                                    {{ $brand_car->name_car_brand }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kiểu dáng</label>
                                        <select name="design_car" id="design_car" class="form-control">
                                            @foreach ($design_cars as $design_car)
                                                <option value="{{ $design_car->id }}" 
                                                    {{ $brand_car->id == $post->id_design_car ? 'selected' : '' }}>
                                                    {{ $design_car->name_design_car}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá</label>
                                        <input type="number" class="form-control" name="price" value="{{ number_format($post->price, 0, ',', '.')}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <select name="address" id="address" class="form-control">
                                            @foreach ($address as $addres)
                                                <option value="{{ $addres->id }}"                                                                             
                                                {{ $addres->id == $post->id_address ? 'selected' : ''}}>
                                                {{ $addres->province }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>

                                @if ($post->url_picture)
                                    <img src="{{ asset('storage/' . $post->url_picture) }}" alt="Current Image" width="150">
                                @endif
                        
                                <!-- Input để chọn hình ảnh mới -->
                                <input type="file" class="form-control" name="url_picture" value="{{ old('url_picture', $post->url_picture) }}">
                            </div>


                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Năm sản xuất</label>
                                        <input type="number" class="form-control" name="year" value="{{ $post->year }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Quãng đường đã đi</label>
                                        <input type="number" class="form-control" name="mileage" value="{{$post->mileage}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Màu xe</label>
                                        <input type="text" class="form-control" name="mau_xe" value="{{ $post->mau_xe}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhiên liệu</label>
                                        <select name="fuel_type" class='form-control'>
                                            <option value="xăng" {{ $post->fuel_type == 'xăng' ? 'selected' : '' }}>Xăng</option>
                                            <option value="điện" {{ $post->fuel_type == 'điện' ? 'selected' : '' }}>Điện</option>
                                            <option value="dầu" {{ $post->fuel_type == 'dầu' ? 'selected' : '' }}>Dầu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hộp số</label>
                                        <select name="gearbox" class='form-control'>
                                            <option value="số sàn" {{ $post->gearbox == 'số sàn' ? 'selected' : '' }}>Số sàn</option>
                                            <option value="số tự động" {{ $post->gearbox == 'số tự động' ? 'selected' : '' }}>Số tự động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số chỗ ngồi</label>
                                        <input type="number" class="form-control" name="number_seats"
                                            value="{{$post->number_seats}}">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="d-flex justify-content-end">
                                <div>
                                    <a href="{{ route('mypost')}}" class="btn btn-secondary">Hủy</a>
                                    <button type="submit" class="btn btn-success">Sửa</button>
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