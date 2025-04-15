<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    public function user()
    {
        $user = Auth::user();
        $rentals = Rental::with('room')
            ->where('tenant_id', $user->id)
            ->latest()
            ->get();

        return view('tenant.profile', ['user' => $user, 'rentals' => $rentals]);
    }

    public function show()
    {
        return view('admin.user', ['users' => User::all()]);
    }

    public function store(Request $request)
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

    public function update(string $id)
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

    public function destroy(string $id)
    {
        try {
            User::destroy($id);
            return redirect('/dashboard/user')->with('success', 'User has been deleted');
        } catch (\Exception $exception) {
            return redirect('/dashboard/user')->with('error', $exception->getMessage());
        }
    }


}
