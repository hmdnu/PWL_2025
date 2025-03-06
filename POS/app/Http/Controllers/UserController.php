<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(string $id, string $name)
    {
        return view("user", ["name" => $name]);
    }
}