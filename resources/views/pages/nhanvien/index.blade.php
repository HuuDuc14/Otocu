@extends('app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{route('nhanvien.create')}}">Them</a>

            <form action="{{route('nhanvien.search')}}">
                @csrf
                <div class="input-group">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="search" name="search" id="form1" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>



            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ten</th>
                        <th>Email</th>
                        <th>Thao tac</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Ten</th>
                        <th>Email</th>
                        <th>Thao tac</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($users as $user)
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{route('nhanvien.edit',$user->id)}}">Edit</a>
                                    <a href="{{route('nhanvien.delete', $user->id)}}">Delele</a>
                                </td>


                            </tr>
                        @endforeach
                </tbody>
            </table>

            {{ $users->links() }}
        </div>
    </div>
</div>


<script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000
    });
</script>


{{-- @if (session('success'))


@endif

@if (session('error'))

@endif

@endsection --}}