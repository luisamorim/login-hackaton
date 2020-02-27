<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->update(
            ['name' => $request['name'],
             'password' => bcrypt($request['password'])
        ]);

        return redirect()->route('home');
    }

}
