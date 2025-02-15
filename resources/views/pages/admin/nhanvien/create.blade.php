@extends('index')
@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create staff</h6>
        </div>
        <div class="card-body">
            <form action="{{route('nhanvien.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="username" value="{{old('username')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" name="password" value="{{old('password')}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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