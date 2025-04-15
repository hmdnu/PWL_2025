<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RentalController extends Controller
{
    public function store(Request $request, string $roomId, string $tenantId)
    {
        try {
            $data = $request->array(['start_date', 'end_date']);
            $path = Storage::disk('local')->putFile($request->file('attachment'));

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
        } catch (\Exception $exception) {
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
            return redirect('/' . auth()->user()->id, ResponseAlias::HTTP_OK);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }
    }
}