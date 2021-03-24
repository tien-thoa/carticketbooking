<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use App\Vehicles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    // dùng User phải khai báo đỉa chỉ đường dẫn App\User;
    public function edit() {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
            return view('user.edit')->withUser($user);
            } else {
                return redirect()->back();
            }
        }
    }
    public function update(Request $request) {
        $user = User::find(Auth::user()->id);
        if($user) {
            $validate = null;
            if (Auth::user()->email === $request['email']){
                $validate = $request->validate([
                    'name' => 'required|min:2',
                    'email' => 'required|email'
                ]);
            } else {
                $validate = $request->validate([
                    'name' => 'required|min:2',
                    'email' => 'required|email|unique:users'
                ]);
            }
            if ($validate) {   
            $user->name = $request ['name'];
            $user->email = $request ['email'];
            $user->address = $request ['address'];
            $user->phone = $request ['phone'];
            $user->gender = $request ['gender'];
            $user->save();
            $request->session()->flash('success', 'Cập nhật thành công!!!');
            return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    } 
    public function passwordEdit() {
        if (Auth::user()) {

            return view('user.password');
            } else {
                return redirect()->back();
            }
    }
    // password_confirmation lấy từ name = password_confirmation where Current password
    // min:7 không nhỏ hơn 7
    // Hash để lưu mật khẩu của người dùng
    // Dùng Hand:: phải khai báo use Illuminate\Support\Facades\Hash;
    public function passwordUpdate(Request $request) {
        $validate = $request->validate([
            'oldPassword' => 'required|min:7',
            'password' => 'required|min:7|required_with:password_confirmation'
        ]);
        $user = User::find(Auth::user()->id);

        if ($user) {
            if (Hash::check($request['oldPassword'],$user->password)&& $validate) {
                $user->password = Hash::make($request ['password']);
                $user->save();

                $request->session()->flash('success', 'Đổi mật khẩu thành công!!!');
                return redirect()->back();
            } else {
                $request->session()->flash('error', 'Đổi mật khẩu thất bại!!!');
                return redirect()->route('password.edit');
            }
        } 
    }
    public function profileticket() {
        $tickets = Ticket::with('users','vehicles')->where('users_id',[Auth::user()->id])->get();
        return view ('user.profileticket',[
            'tickets'=>$tickets,
        ]);
    }
    // public function booking(Request $request,$id){
    //     $user = User::find(Auth::user()->id);
    //     $vehicles = Vehicles::find($id);
    //     $tickets = new Ticket;
    //     $tickets->users_id = $user -> id;
    //     $tickets->vehicles_id = $vehicles -> id;
    //     $tickets->awaycome = $request['awaycome'];
    //     $tickets->departure_time = $request['departure_time'];
    //     $tickets->destination = $request['destination'];
    //     $tickets->arrival_time = $request['arrival_time'];
    //     $tickets->price = $request['price'];
    //     $tickets->save();
    //     return redirect('user/profileticket');
    //     }
    public function booking(Request $request,$id){
            $user = User::find(Auth::user()->id);
            $tickets = Ticket::find($id);
            if ($tickets) {
                if ($tickets['users_id'] == null) {
                    $tickets->users_id = $user -> id;
                    $tickets->save();
                    $request->session()->flash('success', 'Đặt vé thành công!!!');
                    return redirect('user/profileticket');
                } else {
                    $request->session()->flash('error', 'Vé đã được đặt!!!');
                    return redirect()->back();
                }
            }}
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/home');
    }
}
