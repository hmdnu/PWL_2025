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
        //     'level_id' => 2,
        //     'username' => 'manager-2',
        //     'nama' => 'manager 2',
        //     'password' => Hash::make('1234'),
        // ];

        // UserModel::create($data);
        // $user = UserModel::firstWhere('level_id', 1);

        // $user = UserModel::findOr(1, ['username', 'nama'], function () {
        //     abort(404);
        // });

        // $user = UserModel::findOrFail(1);

        $user = UserModel::where('level_id', 2)->count();

        return view('user', ['data' => $user]);
    }
}