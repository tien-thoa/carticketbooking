<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Vehicles;
class ManagerVehiclesController extends Controller
{
    public function manager(Request $request,$modelName) {
        $adminUser = Auth::guard('admin')->user();
        $model = 'App\\'.ucfirst($modelName);
        $model = new $model;
        $configs = $model->listingconfigs();
        $conditions = $model->getFilter($request, $configs);
        $records = $model->getRecords($conditions);
        return view('admin.vehicles.managervehicles',[
            'user'=>$adminUser,
            'records'=>$records,
            'configs'=>$configs,
            'title'=>$model->title,
            'modelName'=>$modelName,
            ]);
    }
    public function create() {
        $adminUser = Auth::guard('admin')->user();
        return view('admin.vehicles.create',[
            'user'=>$adminUser
        ]); 
    }
    public function createupdate(Request $request) {
      
        $adminUser = Auth::guard('admin')->user();
        $vehicles = new Vehicles;
        $vehicles->garage = $request['garage'];
        $vehicles->type = $request['type'];
        $vehicles->number_of_seats = $request['number_of_seats'];
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/',$filename);
            $vehicles->image = $filename;
        } else {
        return $request;
        $vehicles->image = '';
        }
        $vehicles->save();
        return redirect('/admin/managerv/Vehicles');
        return view([
            'user'=>$adminUser
        ]); 
        
    }
    // public function createupdate(Request $request) {
    //     $adminUser = Auth::guard('admin')->user();
    //     $vehicles = new Vehicles;
    //     if($vehicles) {
    //         $validate = null;
    //         if (Auth::guard('vehicles')->user()){
    //             $validate = $request->validate([
    //                 'garage' => 'required|garage'
    //             ]);
    //         } else {
    //             $validate = $request->validate([
    //                 'garage' => 'required|unique:vehicles'
    //             ]);
    //         }
    //         if ($validate) {   
    //             $vehicles->garage = $request['garage'];
    //             $vehicles->type = $request['type'];
    //             $vehicles->number_of_seats = $request['number_of_seats'];
    //             $vehicles->save();
    //         $request->session()->flash('success', 'Tạo mới thành công!!!');
    //         return redirect('/admin/managerv/Vehicles');
    //         return view([
    //             'user'=>$adminUser
    //         ]);    
    //         } else {
    //             return redirect()->back();
    //             $request->session()->flash('error', 'Tạo mới thất bại!!!');
    //         }
    //     } else {
    //         return redirect()->back();
    //     }
    // } 
    public function edit($id) {
        $adminUser = Auth::guard('admin')->user();
        $vehicles = Vehicles::find($id);
        return view('admin.vehicles.edit',[
            'vehicles' =>$vehicles,
            'user'=>$adminUser
        ]);
    }
    public function update(Request $request,$id) {
        $adminUser = Auth::guard('admin')->user();
        $vehicles = Vehicles::find($id);
        $vehicles->garage = $request['garage'];
        $vehicles->type = $request['type'];
        $vehicles->number_of_seats = $request['number_of_seats'];
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/',$filename);
            $vehicles->image = $filename;
        } else {
        return $request;
        $vehicles->image = '';
        }
        $vehicles->save();
        $request->session()->flash('success', 'Cập nhật thành công !!!');
            return view('admin.vehicles.edit',[
                'vehicles'=>$vehicles,
                'user'=>$adminUser
            ]); 
}
    public function delete($id) {
        $adminUser = Auth::guard('admin')->user();
        $users = Vehicles::find($id);
        $users->delete();
        return redirect()->back();
        return view([
            'users'=>$users,
            'user'=>$adminUser
            
            ]);
    }
}
