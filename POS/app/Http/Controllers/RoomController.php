<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.room', ['rooms' => Room::all()]);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'floor' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('modal', 'modal-create');
            }
            $path = $request->file('room_image')->store('room', 'public');

            Room::create([
                'name' => $request->get('name'),
                'floor' => $request->get('floor'),
                'image' => $path
            ]);
            return redirect('/dashboard/room')->with('success', 'Room created!');
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    public function destroy(string $id)
    {
        try {
            Room::destroy($id);
            return redirect('/dashboard/room')->with('success', 'Room deleted!');
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'floor' => 'required|string',
                'status' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('modal', 'modal-update');
            }

            $room = Room::find($id);

            $placeholderPath = 'room/placeholder.png';

            if ($request->hasFile('room_image')) {
                // Only delete the old image if it's not the placeholder
                if ($room->image !== $placeholderPath && Storage::disk('public')->exists($room->image)) {
                    Storage::disk('public')->delete($room->image);
                }

                // Store new image
                $path = $request->file('room_image')->store('room', 'public');
            } else {
                $path = $room->image; // retain old image if no new one
            }

            $room->update([
                'name' => $request->get('name'),
                'floor' => $request->get('floor'),
                'status' => $request->get('status'),
                'image' => $path,
            ]);

            return redirect('/dashboard/room')->with('success', 'Room updated!');
        } catch (Exception $exception) {
            dd($exception);
        }
    }
}
