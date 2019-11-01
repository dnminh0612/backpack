@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <table class="table">
            <thead class="black white-text">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Quyền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->admin == 1 ? 'Admin' : 'Người dùng' }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
