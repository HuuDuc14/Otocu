@extends('app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Theem moi nhan vien</h6>
    </div>
    <div class="card-body">
        <form action="{{route('nhanvien.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">ten</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">email</label>
                <input type="text" class="form-control" name="email" value= "{{old('email')}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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

