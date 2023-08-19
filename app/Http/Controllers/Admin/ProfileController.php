<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $userData = $request->except(['_token']);
        if($request->file('profile_photo_path')) {
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $userData['profile_photo_path'] = $request->file('profile_photo_path')->store('/profile_photo');
        }
        $user->fill($userData);
        $user->save();
        return redirect()->route('admin.profile.index')->with('toast_success', 'Profil Berhasil Diubah!');
    }
}
