<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function create(User $userClasses): View
    {
        // set breadcrumb trail
        $breadcrumb = [
            'menu-title' => 'Accueil',
            'menu-item' => [
                'Profil'
            ]
        ];

        // user sessions log
        $userSessionLog = $userClasses->_getUserSessionData();

        // dd($userSessionLog);
        return view('pages.profile.profile', [
            'breadcrumbTrail' => $breadcrumb,
            'userSessionLog' => $userSessionLog,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // user id
        $id = auth()->id();

        // validate
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // dd($request->input());

        // update...
        User::where('id', $id)
            ->update([
                'fname' => trim($request->input()['fname']),
                'lname' => trim($request->input()['lname']),
                'phone' => trim($request->input()['phone']),
                'email' => trim($request->input()['email']),
            ]);
        // $request->user()->save();

        return Redirect::route('profile.create')->with('status', 'profile-updated');
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
