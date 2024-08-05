<?php

namespace App\Http\Controllers;
use Alert;
use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'confirmed'
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        if(!empty($request->password))
        {
            $user->password = Has::make($request->password);
        }
        $user->update();

        alert()->success('Update Succeeded', 'Success');
        return redirect('profile');
    }
}
