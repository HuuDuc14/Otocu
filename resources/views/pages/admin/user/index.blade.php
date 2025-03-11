@extends('app')
@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                        Người dùng
                    </h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item">Tất cả người dùng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table no-wrap v-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th class="font-14 font-weight-medium text-dark">id</th>
                                            <th class="font-14 font-weight-medium text-dark">Tên người dùng</th>
                                            <th class="font-14 font-weight-medium text-dark">Email</th>
                                            <th class="font-14 font-weight-medium text-dark">Số điện thoại</th>
                                            <th class="font-14 font-weight-medium text-primary">Số bài viết</th>
                                            <th class="font-14 font-weight-medium text-success">Được duyệt</th>
                                            <th class="font-14 font-weight-medium text-danger">Từ chối</th>
                                            <th class="font-14 font-weight-medium text-dark">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <td class="border-top-0 px-2 py-4 text-dark">{{$user->id}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td class="font-weight-medium text-primary">{{$user->posts_count}}</td>
                                            <td class="font-weight-medium text-success">{{$user->posts_approved_count}}</td>
                                            <td class="font-weight-medium text-danger">{{$user->posts_refused_count}}</td>
                                            <td>
                                                <a href="{{route('user.delete', $user->id)}}"
                                                    class="btn btn-sm btn-danger shadow-sm">Khóa tài khoản</a>
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
                timer: 3000
            });
        </script>
        {{-- Xóa thông báo sau khi hiển thị (Chỉ để hiển thị 1 lần) --}}
        {{ session()->forget('success') }}
    @endif



@endsection