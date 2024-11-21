<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
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
            'date' => 'required|string',
            'time' => 'required|string',
            'venue' => 'required|string|max:255',
            'notes' => 'nullable|string|max:200'
        ]);

        $data['reservation_id'] = $reservationId;


        $admin =  Customer::create($data);

        $defaultDatas = [
            'customer_id' =>  $admin->id,
            'status' => 'R'
        ];


        $defaultDatas = Admin::create($defaultDatas);

        //  For Mail
        $emailData = [
            'reservationId' => $reservationId,
            'firstName' => $admin->first_name,
            'lastName' => $admin->last_name,
            'email' => $admin->email,
            'date' => $admin->date,
            'time' => $admin->time,
            'venue' => $admin->venue
        ];


        Mail::to($admin->email)->send(new ReservationMail($emailData));
        /////

        if (!$defaultDatas) {
            return response()->json([
                'message' => 'User failed to reserve a room. Please try!',
            ], 401);
        }

        return response()->json([
            'message' => 'User reserved successfully',
            'data' => $data
        ], 201);
    }
}