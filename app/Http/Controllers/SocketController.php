<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Request;

class SocketController extends Controller {

    public function index()
    {
        return view('socket');
    }

    public function writemessage()
    {
        return view('writemessage');
    }

    public function sendMessage(){
        $redis = Redis::connection();
        $redis->publish('test-message', "hashjgadshgjasdhgjsd");
        return redirect('writemessage');
    }
}
