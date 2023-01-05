<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileUpdateRequest;
use App\Models\UserProfile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserProfileController extends Controller
{

    public function create(Request $request)
    {
       $userProfile = UserProfile::where('user_id', auth()->user()->id)->first();

       if (!$userProfile) $userProfile = new UserProfile();

        return Inertia::render('UserProfile/create', [
            'status' => session('status'),
            'userProfile' => $userProfile,
        ]);
    }
    public function getProfiles(Request $request)
    {
//        $userProfile = UserProfile::where('user_id', auth()->user()->id)->first();
        $profiles = UserProfile::where('gender','=','Male')->get();

        return Inertia::render('UserProfile/AllProfiles', [
            'status' => session('status'),
            'profiles' => $profiles,
        ]);
    }
    public function update(UserProfileUpdateRequest $userProfileUpdateRequest): RedirectResponse
    {

        $validated = $userProfileUpdateRequest->validated();
        $userId = auth()->user()->id;
        $profile = UserProfile::where('user_id', $userId)->first();
        if($profile) {
            UserProfile::where('id', $profile->id)->update($userProfileUpdateRequest->all());
        } else {
            $userProfileUpdateRequest['user_id'] = $userId;
            UserProfile::create($userProfileUpdateRequest->all());
        }
        return Redirect::route('userProfile.create')->with('success','Profile saved successfully');
    }

}
