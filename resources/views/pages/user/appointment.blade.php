@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lịch hẹn</h1>
            {{-- <div class="d-flex justify-content-end">
                <a href="{{route('post.accepted')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm ">Bài
                    đăng đã được duyệt</a>
                <a href="{{route('post.refused')}}"
                    class="d-none mx-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm ">Bài
                    đăng đã từ chối</a>
                <a href="{{route('post.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tạo bài
                    đăng</a>
            </div> --}}
        </div>
        <div class="shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="form-inline mw-100 navbar-search" action="{{route('post.search')}}">
                        @csrf
                        <div class="input-group">
                            <input type="search" class="form-control bg-light border-0 small" placeholder="Search post..."
                                aria-label="Search" aria-describedby="basic-addon2" name="search" id="form1">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    @if ($appointments->isNotEmpty())
                        <div class="table-responsive mt-5">
                            <table class="table table-bordere text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead >
                                    <tr>
                                        <th>Người hẹn</th>
                                        <th>Xe</th>
                                        <th>Ngày</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($appointments as $appointment)
                                                <td>{{$appointment->customer->username}}                                                  
                                                </td>
                                                <td>{{$appointment->post->carBrand->name_car_brand ?? 'N/A' }} {{$appointment->post->title ?? 'N/A' }}</td>
                                                <td>{{$appointment->date ?? 'N/A'}}</td>                
                                                <td>{{$appointment->status ? 'Đã xem' : 'Chưa xem'}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a href="https://zalo.me/{{ $appointment->customer->phone_number }}" target="_blank"
                                                            class="btn btn-sm btn-success shadow-sm"><i class="fa-solid fa-phone-flip"></i></a>
                                                        <a href="{{route('appointment.watched', $appointment->id )}}"
                                                            class="btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-check"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4 class="text-center mt-4">Không có lịch hẹn</h4>
                    @endif



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

    </script>



@endsection