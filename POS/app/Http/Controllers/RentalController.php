<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Room;
use DB;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RentalController extends Controller
{
    public function showPending()
    {
        $rentals = DB::table('rentals')
            ->join('tenants', 'rentals.tenant_id', '=', 'tenants.id')
            ->join('rooms', 'rentals.room_id', '=', 'rooms.id')
            ->join('users', 'tenants.id', '=', 'users.id')
            ->select(
                'rentals.id',
                'users.name as tenant_name',
                'rooms.image as room_image',
                'rooms.name as room_name',
                'rooms.floor as room_floor',
                'rentals.start_date',
                'rentals.end_date',
                'rentals.status',
                'rentals.attachment',
                'rentals.ended'
            )->where('rentals.status', '=', 'pending')
            ->get();

        return view('admin.rental_pending', ['rentals' => $rentals]);
    }

    public function showHistory()
    {
        $rentals = DB::table('rentals')
            ->join('tenants', 'rentals.tenant_id', '=', 'tenants.id')
            ->join('rooms', 'rentals.room_id', '=', 'rooms.id')
            ->join('users', 'tenants.user_id', '=', 'users.id')
            ->select(
                'rentals.id',
                'users.name as tenant_name',
                'rooms.image as room_image',
                'rooms.name as room_name',
                'rooms.floor as room_floor',
                'rentals.start_date',
                'rentals.end_date',
                'rentals.status',
                'rentals.attachment',
                'rentals.ended'
            )->where('rentals.status', '!=', 'pending')
            ->get();

        return view('admin.rental_history', ['rentals' => $rentals]);
    }

    public function store(Request $request, string $roomId, string $tenantId)
    {
        try {
            $data = $request->array(['start_date', 'end_date']);
            $path = $request->file('attachment')->store('attachment', 'public');

            Rental::create([
                'room_id' => $roomId,
                'tenant_id' => $tenantId,
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'attachment' => $path,
            ]);

            Room::where('id', $roomId)->update([
                'status' => 'inavailable'
            ]);
            return redirect('/' . auth()->user()->id, ResponseAlias::HTTP_CREATED);
        } catch (Exception $exception) {
            return response($exception->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }
    }

    public function end(Request $request)
    {
        $query = $request->query();
        try {
            Rental::find($query['rentalId'])->update([
                'status' => 'inactive',
                'ended' => now()
            ]);
            Room::find($query['roomId'])->update([
                'status' => 'available',
            ]);
            return redirect('/' . auth()->user()->id)->with('success', 'end');
        } catch (Exception $exception) {
            return response($exception->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }
    }

    public function approve(string $id)
    {
        try {
            Rental::find($id)->update([
                'status' => 'active'
            ]);

            return redirect('/dashboard/rental/pending')->with('success', 'approved');
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    public function updateStatus(Request $request, string $id)
    {
        try {
            Rental::find($id)->update([
                'status' => $request->get('status'),
            ]);
            return redirect('/dashboard/rental/history')->with('success', 'edited');
        } catch (Exception $exception) {
            dd($exception);
        }
    }
}
