<?php
namespace App\Classes;

use Illuminate\Support\Facades\DB;

class User {

    /**
     * Get user connected data
     * @return array
     */
    public static function _getUserConnectedData() : array
    {
        // set empty array
        $info = [];
        // $user = Auth::user(); // Retrieve the currently authenticated user...
        // $id = Auth::id(); // Retrieve the currently authenticated user's ID...


        // $user = $request->user(); // returns an instance of the authenticated user...
        // $id = $request->user()->id; // Retrieve the currently authenticated user's ID...


        $user = auth()->user(); // Retrieve the currently authenticated user...
        // $id = auth()->id();     // Retrieve the currently authenticated user's ID...

        // set user data in info array
        $info = [
            'id'                    => $user->id,
            'fname'                 => $user->fname,
            'lname'                 => $user->lname,
            'phone'                 => $user->phone,
            'email'                 => $user->email,
            'created_at'            => $user->created_at,
            'email_verified_at'     => $user->email_verified_at,
        ];

        //return data
        return $info;
    }
}
