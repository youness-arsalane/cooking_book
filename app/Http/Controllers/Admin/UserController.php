<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::getUser();
        return view('admin.myProfile.index', compact('user'));
    }

    public function update()
    {
        $user = Auth::getUser();

        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->save();

        return redirect('admin/my-profile');
    }

    public function updatePassword(Request $request)
    {
        if (Auth::Check()) {

            request()->validate([
                'current-password' => 'required',
                'new-password' => 'required|same:new-password-repeat',
                'new-password-repeat' => 'required'
            ]);

            if (Hash::check(request('current-password'), Auth::User()->password)) {
                $user = User::find(Auth::User()->id);
                $user->password = Hash::make(request('new-password'));;
                $user->save();

                return redirect('admin/my-profile');
            } else {
                return redirect('admin/my-profile')->withErrors(array('current-password' => 'Het huidige wachtwoord klopt niet'));
            }
        }
    }
}
