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
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="get" id="form-admin-add-user">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Thêm người dùng</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">

                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="form34" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="form34">Tên</label>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" id="form29" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="form29">Email</label>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-tag prefix grey-text"></i>
                            <input type="text" id="form32" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="form32">Mô tả</label>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-unique col-4">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center">
        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Thêm
            người dùng</a>
    </div>
@endsection

@push('script')
<script>
    $('#form-admin-add-user').submit(function (e) {
        e.preventDefault();
        $(this).find('.btn-unique').html(' <i class="fas fa-circle-notch fa-spin fa-lg"></i>')
    });
</script>
@endpush
