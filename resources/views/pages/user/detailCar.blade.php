@extends('index')
@section('content')
    <div class="container-fluid">
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cars</h1>
            <div class="d-flex justify-content-end">
                <a href="{{route('post.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Đăng
                    bài</a>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-7">
                <img src={{ asset('storage/' . $car->url_picture) }} alt="raptor" width="100%" class="mb-2" />
            </div>
            <div class="col-md-5">
                <div class="thongtin">
                    <p class="name">{{ $car->carBrand->name_car_brand ?? 'N/A' }} {{ $car->title}}</p>
                    <p class="text-secondary my-1">{{ $car->designCar->name_design_car ?? 'N/A'}}</p>
                    <p class="price">{{ number_format($car->price, 0, ',', '.')}}</p>
                    <div class="item">
                        <p><i class="fa-solid fa-calendar"></i> Năm sản xuất</p>
                        <p>{{ $car->year}}</p>
                    </div>
                    <div class="item">
                        <p><i class="fa-solid fa-road"></i> Đã lăn bánh</p>
                        <p>{{ $car->mileage}} km</p>
                    </div>
                    <div class="item">
                        <p><i class="fa-solid fa-gas-pump"></i> Nhiên liệu</p>
                        <p>{{ $car->fuel_type}}</p>
                    </div>
                    <div class="item">
                        <p><i class="fa-solid fa-palette"></i> Màu</p>
                        <p>{{ $car->mau_xe}}</p>
                    </div>
                    <div class="item">
                        <p><i class="fa-solid fa-gears"></i> Hộp số</p>
                        <p>{{ $car->gearbox}}</p>
                    </div>
                    <div class="item">
                        <p><i class="fa-solid fa-couch"></i> Chỗ ngồi</p>
                        <p>{{ $car->number_seats}}</p>
                    </div>

                    <hr />
                    <div class="item">
                        <p><i class="fa-solid fa-user"></i> Người bán</p>
                        <p>{{ $car->user->username ?? 'N/A'}}</p>
                    </div>
                    <div class="item">
                        <p><i class="fa-solid fa-location-dot"></i> Địa điểm</p>
                        <p>{{ $car->district->name ?? 'N/A'}}, {{ $car->province->name ?? 'N/A'}}</p>
                    </div>
                    <div class="goi">
                        <button onclick="appointment({{$car}})" class="btn btn-primary">Hẹn ngày xem xe</button>
                        <a class="btn btn-success" href="https://zalo.me/{{ $car->user->phone_number }}" target="_blank"><i
                                class="fa-solid fa-phone"></i>Gọi điện</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="appointment" tabindex="-1" aria-labelledby="deletePostLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePostLabel">Đặt lịch xem xe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="user" action="{{route('appointment.store')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="text" name="id_seller" hidden id="id_seller">
                            <input type="text" name="id_post" hidden id="id_post">
                            <div class="form-group">
                                <label>Người bán:</label>
                                <input type="text" class="form-control form-control-user" id="seller" placeholder="name"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label >Xe:</label>
                                <input type="text" class="form-control form-control-user" id="title" readonly>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Ngày xem<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control form-control-user" id="date" placeholder="Date"
                                        name="date">
                                </div>
                                <div class="col-sm-6">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control form-control-user" id="province"
                                        placeholder="Province" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Đặt lịch</button>
                        </div>
                    </form>
                </div>
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


    <script>
        function appointment(car) {
            document.getElementById('seller').value = `${car.user.username}`;
            document.getElementById('title').value = `${car.car_brand.name_car_brand} ${car.title}`;
            document.getElementById('province').value = `${car.province.name}`;
            document.getElementById('id_seller').value = `${car.user.id}`;
            document.getElementById('id_post').value = `${car.id}`;
            $('#appointment').modal('show');

        }
    </script>

@endsection