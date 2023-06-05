<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //  REGISTRATION
    public function storeEmployee(Request $request) {


        try {
            $user = User::find($request->employee_number);

            $user->update([
                "name" =>  $request->name,
                "surname" =>  $request->surname,
                "department" =>  $request->department,
                "email_address" =>  $request->email_address,
                "password" =>  $request->password,
            ]);

            return back()->with('success', 'Successfully Registered Employee ID ' . $user->id . ', ' . $user->name . ' ' . $user->surname . '. Please scan your fingerprint again to login');
        } catch (\Exception $e) {
            return back()->with('success', 'Failed To Registered Employee ID ' . $request->employee_number . ', ' .  $request->name . ' ' . $request->surname . '');

        }


    }


    // STATISTICS

    public function statisticsIndex(){
        $users = User::where('is_logged', 1)->get();
        return view('statistics', compact('users'));
    }
}
