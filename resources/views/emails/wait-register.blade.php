@extends('index')

@section('content')
    <div class="container-fluid">
        <h2>Vui lòng kiểm tra email vừa đăng ký để xác thực tài khoản</h2>
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