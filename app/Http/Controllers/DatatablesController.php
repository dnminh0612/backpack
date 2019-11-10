<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatatablesController extends Controller
{
    public function listUser()
    {
        return DataTables::of(User::query())
            ->make(true);
    }
}
