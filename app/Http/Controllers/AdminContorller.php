<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminContorller extends Controller
{
    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Logout succesfully',
            'alert-type' => 'error'
        );
        return redirect('/login')->with($notification);
    }

    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function editProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function storeProfile(Request $request){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $profileData->name = $request->name;
        $profileData->username = $request->username;
        $profileData->email = $request->email;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');

            $imagename_gen = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$imagename_gen);
            $profileData->profile_image = $imagename_gen;

        }
        $profileData->save();

        $notification = array(
            'message' => 'Profile updated succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function changePassword(){

        return view('admin.admin_password_change');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldpassword,$hashedPassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated successfully');
            return redirect()->back();

        }else{
            session()->flash('message','Old Password is not matched');
            return redirect()->back();
        }
        

    }
}
