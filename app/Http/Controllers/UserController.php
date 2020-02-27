<?php

namespace App\Http\Controllers;

use App\Http\Middleware\FrameHeadersMiddleware;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'xframe']);
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

        $userteste = User::find(Auth::user()->id);
        $userteste->name = $request['name'];
        $userteste->password = bcrypt($request['password']);
        $userteste->update();

        return redirect()->route('home');
    }

}
