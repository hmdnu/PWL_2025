<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {

        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'pelanggan',
        //     'password' => Hash::make('1234'),
        //     'level_id' => 3
        // ];

        // UserModel::insert($data);


        $data = [
            'nama' => 'pelanggan pertama'
        ];
        UserModel::where('username', 'customer-1')->update($data);

        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
