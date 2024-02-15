<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.                                               
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validate profile photo
        $request->validate([
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        // Update profile photo if provided
        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('profile-photos', 'public');
            $request->user()->update(['profile_photo_path' => $photoPath]);
        }
    
        // Update user profile information
        $request->user()->update($request->validated());
    
        // Reset email verification if email has changed
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            $request->user()->save();
        }
    
        return back()->with('success', 'Profile updated successfully.');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
