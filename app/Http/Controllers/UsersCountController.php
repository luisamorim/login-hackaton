<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class UsersCountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the users in DB.
     *
     */
    public function usersRegistered()
    {
        $users = DB::table('users')->get();

        $qtd = count($users);

        return json_encode($qtd);
    }
}
