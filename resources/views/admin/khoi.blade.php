@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <a href="{{ route('admin.khoi_them') }}" class="btn btn-default">Thêm mới</a>
        <table class="table">
            <thead class="black white-text">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($khoi) > 0)
                @foreach($khoi as $key => $_khoi)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $_khoi->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.khoi_delete', $_khoi->id) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2" class="text-center">Không có dứ liệu</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection

