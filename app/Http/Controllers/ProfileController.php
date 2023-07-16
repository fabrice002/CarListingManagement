<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\User2;
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
        // dd($request->user()->email);
        $name=User2::where('email', $request->user()->email)->get();
        // 'profile.edit'
        return view('profile.profil', [
            'user' => $request->user(),
            'name'=>$name[0]->name,
            'id'=>$name[0]->id
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        // dd($request->all());
        User::where('id', $request->user()->id)
            ->update([
                "login"=>$request->login
            ]);
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            User2::where("id", $request->id)
                   ->update([
                        "email"=>$request->email
                    ]);
        }
        if(User2::where("name", $request->name)->get()->count() == 0){
            User2::where("id", $request->id)
                   ->update([
                        "name"=>$request->name
                    ]);
        }
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/Car');
    }
}
