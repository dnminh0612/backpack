@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="card" style="width: 40rem;">
                        <div class="card-body" style="height: 500px; overflow: auto">
                        </div>
                        <div class="card-footer">
                            <form action="sendmessage" method="POST" id="frm-send" class="">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" required id="txt-message" type="text" name="message">
                                </div>
                                <button class="btn btn-danger float-right" id="btn-send" type="submit" >Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var socket = io.connect({{url('/')}}+':6001');
        console.log(socket);
        $('#frm-send').submit(function (e) {
            e.preventDefault();
            var ms = $('#txt-message');
            socket.emit('chat',{
                message: ms.val(),
                id: socket.id,
            });
            ms.val('');
        });


        socket.on('chat', function (data) {
            console.log(data);
            if(socket.id === data.id){
                $( ".card-body" ).append( "<div class='text-right mr-4 mt-1'>Mày</div><div class='text-right p-2 pr-4 '><span class='border rounded-pill bg-info pt-2 pb-2 pl-4 pr-4'>"+data.message+"</span></div>" );
            }else{
                $( ".card-body" ).append( "<div class='text-left mr-4 mt-1'>Người ta</div><div class='text-left p-2 pr-4 '><span class='border rounded-pill bg-light pt-2 pb-2 pl-4 pr-4'>"+data.message+"</span></div>" );
            }
        });
    </script>
@endpush
