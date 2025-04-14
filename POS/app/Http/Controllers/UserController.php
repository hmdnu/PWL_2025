<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rentals = Rental::with('room')
            ->where('tenant_id', $user->id)
            ->latest()
            ->get();

        return view('tenant.profile', ['user' => $user, 'rentals' => $rentals]);
    }
}
