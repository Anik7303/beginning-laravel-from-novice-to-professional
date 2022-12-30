<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        return view('settings.profile', ['user' => auth()->user()]);
    }

    /**
     * Update user's profile data
     * @param ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $profile_data = $request->validated();
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = "profile_picture_{$request->user()->id}.{$extension}";
            $file->move(public_path('uploads'), $filename);
            $profile_data['profile_picture'] = $filename;
        }
        $request->user()->update($profile_data);
        return back()->with('message', 'Profile has been updated.');
    }
}