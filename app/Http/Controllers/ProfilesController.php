<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('profiles.profile')
            ->with('user', $user);
    }

    public function edit($slug) {
        $user = User::where('slug', $slug)->first();
        $profile = $user->profile;
        return view('profiles.edit')
            ->with('profile', $profile);
    }

    public function update($slug, Request $req) {
        $user = User::where('slug', $slug)->first();

        if (Auth::user()->id !== $user->id) return;

        $this->validate($req, [
            'location' => 'required',
            'about' => 'required|max:255'
        ]);

        $user->profile->update([
            'location' => $req->location,
            'about' => $req->about,
        ]);

        if($req->hasFile('avatar'))
        {
            Auth::user()->update([
                'avatar' => $req->avatar->store('public/avatars')
            ]);
        }

        Session::flash('success', 'Profile updated.');

        return redirect()->route('profile', ['slug' => $user->slug]);

    }
}
