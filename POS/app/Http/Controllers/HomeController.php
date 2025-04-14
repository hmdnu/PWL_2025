<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('tenant.home', ['rooms' => Room::all()]);
    }
    public function room($id)
    {
        return view('tenant.room', ['room'=> Room::all()->find($id)]);
    }
}
