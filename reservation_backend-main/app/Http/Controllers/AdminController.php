<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'rental_time' => 'nullable|date_format:Y-m-d H:i',
            'venue' => 'required|string|max:255',
            'notes' => 'required|string|max:200'
        ]);

        $data['reservation_id'] = $reservationId;


        $admin =  Customer::create($data);

        $defaultDatas = [
            'customer_id' =>  $admin->id,
            'status' => 'R'
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
}
