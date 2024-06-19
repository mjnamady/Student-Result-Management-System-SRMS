<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function AdminLogout (Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } // End Method

    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminData = User::findOrFail($id);
        return view('admin.admin_profile_view', compact('adminData'));
    } // End Method

    public function AdminProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $admin = User::findOrFail($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
    
        
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            @unlink(public_path('uploads/admin_profile/'.$admin->photo));
            $photoName = 'profile-'. date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/admin_profile'),$photoName);
            $admin['photo'] = $photoName;
        }

        $admin->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    } // End Method

    public function AdminUpdatePassword(Request $request){
        // dd($request);
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ],[
            'old_password.required' => 'Please Enter the Old Password',
            'new_password.required' => 'Please Enter the New Password',
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){
            $notification = array(
                'message' => 'Old Password Does Not Match!',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }

        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Admin Password Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

}
