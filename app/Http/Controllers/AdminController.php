<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email','password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }else {
            $request->session()->flash('error', 'Sai mật khẩu hoặc tài khoản');
            return redirect()->back();
        }
}
    public function dashboard(){
        $adminUser = Auth::guard('admin')->user();
            return view('admin.dashboard',['user'=>$adminUser]);
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    
}
