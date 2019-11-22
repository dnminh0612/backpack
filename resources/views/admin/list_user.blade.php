@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày chỉnh sửa</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <button data-toggle="modal" id="btnEditUser" data-id="{{ $user->id }}" class="btn btn-info text-white">
                            Chỉnh sửa
                        </button>
                        <a href="" class="btn btn-danger">
                            Xóa
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    @push('models')
        <!-- Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="form-group">
                                <label for="inputUserName">Tên</label>
                                <input type="text" class="form-control" id="inputUserName" name="inputUserName" placeholder="Enter user name">
                                <small id="inputUserNameError" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="inputUserEmail">Email</label>
                                <input type="email" class="form-control" id="inputUserEmail" name="inputUserEmail" placeholder="Enter email">
                                <small id="inputUserEmailError" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="inputUserRole">Quyền</label>
                                <select class="form-control" id="inputUserRole" name="inputUserRole">
                                    <option value="0">Người dùng</option>
                                    <option value="1">Admin</option>
                                </select>
                                <small id="inputUserRoleError" class="form-text text-muted"></small>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush

    @push('scripts')
        <script>
            $('#btnEditUser').click(function () {
                userID = $(this).data('id');
                route = "{!!  route('admin.user_edit', ':id') !!}";
                route =  route.replace(':id', userID);
                $.ajax({
                    url: route,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        $('#editUserModal').modal('show');
                        $('#inputUserName').val(data.name);
                        $('#inputUserEmail').val(data.email);
                        $('#inputUserRole').val(data.admin);
                    }
                });
            });
        </script>
    @endpush
@endsection
