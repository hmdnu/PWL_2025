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
        // $user = UserModel::where('level_id', 2)->count();

        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ]
        // );

        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager 22',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]
        // );

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ]
        // );

        $user = UserModel::firstOrNew(
            [
                'username' => 'manager33',
                'nama' => 'Manager 33',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ]
        );

        $user->save();

        return view('user', ['data' => $user]);
    }
}
