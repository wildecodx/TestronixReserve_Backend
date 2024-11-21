<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rooms;

class AdminController extends Controller
{
    public function index()
    {
        $datas = Admin::with('customer')->get();

        return response()->json([
            'data' => $datas
        ], 200);
    }


    //  Auto release reservation id 
    public function generateUniqueReservationId()
    {
        do {
            $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $reservationId = 'RV100' . $randomNumber;
        } while (DB::table('customers')->where('reservation_id', $reservationId)->exists());

        return $reservationId;
    }

    //  Store reservation
    public function store(Request $request)
    {


        $reservationId =  $this->generateUniqueReservationId();


        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email:dns,rfc|max:255|unique:customers',
            // 'rental_time' => 'nullable|date_format:Y-m-d H:i', // eto
            // problem nyan sa date and time format
            'date' => 'required|string|max:10', // eto nalang muna 
            'time' => 'required|string|max:8', // eto nalang muna
            'venue' => 'required|string|max:255',
            'notes' => 'required|string|max:200',
            'status' => 'required|in:S,R,C' // Ensure status is either S, R, or C
        ]);


        

        $data['reservation_id'] = $reservationId;


        $admin =  Customer::create($data);

        $defaultDatas = [
            'customer_id' =>  $admin->id,
            'status'  => $request->status // Use the status from the request
        ];

        $defaultData =  Admin::create($defaultDatas);

        if (!$defaultData) {
            return response()->json([
                'message' => 'User failed to reserve a room. Please try!',
            ], 401);
        }

        return response()->json([
            'message' => 'User reserved successfully',
            'data' => $data
        ], 201);
    }

    //  Show per reservation 
    public function show($id)
    {
        $datas = Admin::with('customer')->find($id);

        if (!$datas) {
            return response()->json([
                'message' => 'No user found'
            ], 404);    
        }

        return response()->json([

            'data' => $datas
        ], 200);
    }


    public function update(Request $request, $id) {
        $data = Admin::with('customer')->find($id);


       $customer = Customer::where('id', $id)->firstOrFail();

        if (!$data || !$customer) {
            return response()->json([
               'message' => 'No data has found for customer'
            ], 404);
        }

        $request->validate([
            'first_name' =>'required|string|max:255',
            'last_name' =>'required|string|max:255',
            'email' =>'required|string|email:dns,rfc',
            'date' => 'required|string', 
            'time' =>'required|string',  
            'venue' =>'required|string|max:255',
            'notes' =>'required|string|max:500'
        ]);

        $customer->update($request->all());

        return response()->json([
           'message' => 'Data updated successfully',
            'data' => $data
        ], 200);
    }

    public function destroy($id) {
        $data = Admin::with('customer')->find($id);

        

        if (!$data) {
            return response()->json([
                'message' => 'No data has found for customer'
            ], 404);
        }
        


        $data->delete();




        return response()->json(['success' => true, 'message' => 'Data removed successfully!'], 200);
    }
    // FOR ROOMS 

    public function displayRoom()
    {
        $rooms = Rooms::all();

        return response()->json([
            'data' => $rooms
        ], 200);
    }


    public function addRoom(Request $request)
    {
        $dataRoom = $request->validate(
            [
                    'room-venue' => 'required',
                    'room-location' => 'required',
                    'room-capacity' => 'required',
                    'room-image' => 'required',
                    'room-features' => 'required',
            ]
        );


        if (filter_var($request->input('room-image'), FILTER_VALIDATE_URL)) {

            $dataRoom['room-image'] = $request->input('room-image');
        } elseif ($request->hasFile('room-image')) {

            $dataRoom['room-image'] = $request->file('room-image')->store('roomAssets', 'public');
        } else {
            return response()->json(['error' => 'Invalid image input'], 422);
        }

        Rooms::create($dataRoom);

        if ($dataRoom) {
            return response()->json([
                'message' => 'Room created successfully',
                'data' => $dataRoom
            ], 201);
        }
    }


    public function updateRoom(Request $request, $id)
    {
        $room = Rooms::findOrFail($id);

        if (!$room) {
            return response()->json([
                'message' => 'Room not found'
            ], 404);
        }

        $dataRoom = $request->validate(['rooms' => 'string|max:255']);

        $room->update($request->all());

        return response()->json([
            'message' => 'Room updated successfully',
            'data' => $dataRoom
        ], 200);
    }


    public function deleteRoom($id)
    {
        $room = Rooms::findOrFail($id);

        $room->delete();

        return response()->json([
            'message' => 'Room deleted successfully',
            'data' => $room
        ], 200);
    }
}
