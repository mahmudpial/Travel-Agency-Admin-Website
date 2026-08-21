<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        return Inertia::render('Profile/Edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null; // Optional if implementing email verification
        }

        $request->user()->save();

        return redirect()->route('profile.edit')->with('success', 'Profile information updated successfully.');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(PasswordUpdateRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->validated('password')),
        ]);

        return redirect()->route('profile.edit')->with('success', 'Password updated successfully.');
    }
}
