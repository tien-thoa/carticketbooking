<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Ticket;
use Illuminate\Support\Facades\DB;
class ManagerTicketController extends Controller
{
    public function manager(Request $request,$modelName) {
        $adminUser = Auth::guard('admin')->user();
        $model = 'App\\'.ucfirst($modelName);
        $model = new $model;
        $configs = $model->listingconfigs();
        $conditions = $model->getFilter($request, $configs);
        $records = $model->getRecords($conditions);
        return view('admin.ticket.managerticket',[
            'user'=>$adminUser,
            'records'=>$records,
            'configs'=>$configs,
            'title'=>$model->title,
            'modelName'=>$modelName,
            ]);
    }
    public function create() {
        $adminUser = Auth::guard('admin')->user();
        $users =  DB::table('users')->get();
        $vehicles =  DB::table('vehicles')->get();
        $tickets = Ticket::with('users','vehicles')->get();
        return view('admin.ticket.create',[
            'user'=>$adminUser,
            'tickets'=>$tickets,
            'users'=>$users,
            'vehicles'=>$vehicles
        ]); 
    }
    public function createupdate(Request $request) {
        $adminUser = Auth::guard('admin')->user();
        $tickets = new Ticket;
        if($tickets) {
            $validate = null;
            if (Auth::guard('ticket')->user()){
                $validate = $request->validate([
                    'number' => 'required|number'
                ]);
            } else {
                $validate = $request->validate([
                    'number' => 'required|unique:tickets'
                ]);
            }
            if ($validate) {   
                $tickets->number = $request['number'];
                $tickets->awaycome = $request['awaycome'];
                $tickets->vehicles_id = $request['vehicles_id'];
                $tickets->destination = $request['destination'];
                $tickets->departure_time = $request['departure_time'];
                $tickets->arrival_time = $request['arrival_time'];
                $tickets->price = $request['price'];
                $tickets->save();
            $request->session()->flash('success', 'Tạo mới thành công!!!');
            return redirect('/admin/manager/Ticket');
            return view([
                'user'=>$adminUser
            ]);    
            } else {
                return redirect()->back();
                $request->session()->flash('error', 'Tạo mới thất bại!!!');
            }
        } else {
            return redirect()->back();
        }
    } 
    public function edit($id) {
        $adminUser = Auth::guard('admin')->user();
        $users =  DB::table('users')->get();
        $vehicles =  DB::table('vehicles')->get();
        $tickets = Ticket::find($id);
        return view('admin.ticket.edit',[
            'tickets' =>$tickets,
            'user'=>$adminUser,
            'users'=>$users,
            'vehicles'=>$vehicles
        ]);
    }
    public function update(Request $request,$id) {
        $users =  DB::table('users')->get();
        $vehicles =  DB::table('vehicles')->get();
        $adminUser = Auth::guard('admin')->user();
        $tickets = Ticket::find($id);
        $tickets->number = $request['number'];
        $tickets->users_id = $request['users_id'];
        $tickets->vehicles_id = $request['vehicles_id'];
        $tickets->awaycome = $request['awaycome'];
        $tickets->destination = $request['destination'];
        $tickets->departure_time = $request['departure_time'];
        $tickets->arrival_time = $request['arrival_time'];
        $tickets->price = $request['price'];
        $tickets->save();
        $request->session()->flash('success', 'Cập nhật thành công !!!');
            return view('admin.ticket.edit',[
                'tickets'=>$tickets,
                'user'=>$adminUser,
                'users'=>$users,
                'vehicles'=>$vehicles
            ]); 
    }
    public function delete($id) {
        $adminUser = Auth::guard('admin')->user();
        $users = Ticket::find($id);
        $users->delete();
        return redirect()->back();
        return view([
            'users'=>$users,
            'user'=>$adminUser
            
            ]);
    }
}
