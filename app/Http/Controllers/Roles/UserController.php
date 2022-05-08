<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['profile', 'updateP', 'password', 'passwordView']);
    }

    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index')->withUsers($users);
    }

    public function trash()
    {
        $users = User::onlyTrashed()->get();
        return view('dashboard.users.trashed')->withUsers($users);
    }

    public function show(User $user)
    {
        return view('dashboard.users.show')
            ->withUser($user);
    }

    public function profile()
    {
        return view('dashboard.users.profile')->withUser(Auth::user());
    }

    public function updateP(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id]
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()
            ->with(['success' => true, 'type' => 'success', 'msg' => __('Profile updated with success')]);
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit')
            ->withUser($user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required'],
        ]);

        if (in_array($request['role'], [1, 5, 9])) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();

            return redirect()->back()
                ->with(['success' => true, 'type' => 'success', 'msg' => __('User updated with success')]);
        }

        return redirect()->back()
            ->with(['success' => true, 'type' => 'danger', 'msg' => __('Can\'t add user, Please verify your entries')]);
    }

    public function passwordView()
    {
        return view('dashboard.users.password');
    }


    public function password(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        User::find(Auth::id())->update([
            'password' => Hash::make($request['new-password']),
        ]);

        return redirect()->back()->with("success", "Password successfully changed!");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()
            ->with(['success' => true, 'type' => 'dark', 'msg' => __('user trashed with success')]);
    }

    public function restore(User $user)
    {
        $user->restore();
        return redirect()->back()
            ->with(['success' => true, 'type' => 'primary', 'msg' => __('user restored with success')]);
    }

    public function delete(User $user)
    {
        $user->forceDelete();
        return redirect()->back()
            ->with(['success' => true, 'type' => 'danger', 'msg' => __('user deleted with success')]);
    }
}
