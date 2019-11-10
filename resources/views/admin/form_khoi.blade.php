@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="col-12 col-md-4">
            <!-- Default form subscription -->
            <form class="text-center border border-light p-5" method="post" action="{{ route('admin.khoi_them_store') }}">
                @csrf
                <!-- Name -->
                <input type="text" name="name" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Name">
                <!-- Sign in button -->
                <button class="btn btn-info btn-block" type="submit">Thêm</button>
            </form>
            <!-- Default form subscription -->
        </div>
    </div>
@endsection

