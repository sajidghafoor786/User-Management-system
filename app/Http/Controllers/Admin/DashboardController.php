<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        return view('admin.index');
    }
    public function manageUser()
    {

        $user = User::get();
        return view('admin.pages.manage-user', compact('user'));
    }
    public function editUser(Request $request)
    {

        $user = User::find($request->id);
        //   dd($user);
        return  response([
            'status' => 200,
            'user' => $user
        ]);
    }
    public function updateUser(Request $request)
    {
        // Check if the user with the given id exists
        $existingUser = User::where('email', $request->input('email'))->first();
        //   dd($existingUser);

        if (!$existingUser) {
            // If the user does not exist, handle the error
            return back()->with('error', 'User not found');
        }

        if ($existingUser->id != $request->input('editId')) {
            // If the email already exists for another user, return an error
            return redirect()->back()->with('error', 'Email already exists for another user');
        } else {
            // Update the user details
            $existingUser->name = $request->name;
            $existingUser->email = $request->email;
            $existingUser->designation = $request->designation;
            $existingUser->contact = $request->contact;
            $existingUser->address = $request->address;
            $existingUser->role = $request->role;
            $existingUser->save();
            return redirect()->back()->with('success', 'User updated successfully');
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect()->back()->with('success', 'user delete Succesfully');
    }
    public function deleteAccount(Request $request)
    {

        $user = User::find($request->id);
        // dd( $user );
        Auth::logout();
        $user->delete();

        return redirect()->route('login')->with('success', 'Account deleted Succesfully');
    }
}
