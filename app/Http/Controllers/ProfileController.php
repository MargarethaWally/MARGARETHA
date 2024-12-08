<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller

{

    public function edit()
    {
        $id_user = Auth::id();
        $profile = Profile::where('user_id', $id_user)->first();
        return view('profile.edit', ['profile' => $profile]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'age' => 'required',
            'bio' => 'required',
            'address' => 'required',
            'photo_profile' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = Profile::find($id);
        $profile->age = $request->input('age');
        $profile->bio = $request->input('bio');
        $profile->address = $request->input('address');

        if ($request->has('photo_profile')) {
            if ($profile->photo_profile != null) {
                $path = "uploads/profile/";
                File::delete($path . $profile->photo_profile);
            }

            $imageName = time() . '.' . $request->photo_profile->extension();
            $request->photo_profile->move(public_path('uploads/profile/'), $imageName);
            $profile->photo_profile = $imageName;
        }

        $profile->save();
        return redirect('/about')->with('success', 'Data Profile berhasil Diupdate');
    }
}