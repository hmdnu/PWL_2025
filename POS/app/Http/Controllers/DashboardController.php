<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DashboardController extends Controller
{
    public function user()
    {
        return view('admin.user', ['users' => User::all()]);
    }

    public function userCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_induk' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal', 'modal-create');
        }
        try {
            $data = $request->all();
            $user = User::create([
                'no_induk' => $data['no_induk'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            return redirect('/dashboard/user', ResponseAlias::HTTP_CREATED)->with('success', 'User created!');
        } catch (\Exception $exception) {
            return redirect('/dashboard/user')->with('error', $exception->getMessage());
        }
    }

    public function userEdit(string $id)
    {
        try {
            User::find($id)->update([
                'name' => request('name'),
                'email' => request('email'),
            ]);
            return redirect('/dashboard/user')->with('success', 'User has been updated');
        } catch (\Exception $exception) {
            return redirect('/dashboard/user')->with('error', $exception->getMessage());
        }
    }

    public function userDelete(string $id)
    {
        try {
            User::destroy($id);
            return redirect('/dashboard/user')->with('success', 'User has been deleted');
        } catch (\Exception $exception) {
            return redirect('/dashboard/user')->with('error', $exception->getMessage());
        }
    }

    public function room()
    {
        return view('admin.room', ['rooms' => Room::all()]);
    }
}
