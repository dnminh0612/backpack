@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" >
                <div id="messages" ></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script type="text/javascript">
        var socket = io.connect('http://localhost:6001');
        socket.on('chat', function (data) {
            console.log(data);
            $( "#messages" ).append( "<p>"+data.message+"</p>" );
        });
    </script>
    @endpush
