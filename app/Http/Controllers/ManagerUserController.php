<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Directory;
use Illuminate\Support\Facades\DB;
class ManagerUserController extends Controller
{
    // public function manager(){
    //     $adminUser = Auth::guard('admin')->user();
    //     $users = DB::table('users')->paginate(10);
    //     return view('admin.user.manageruser',[
    //         'users'=>$users,
    //         'user'=>$adminUser
    //         ]);
    // }
    public function manager(Request $request,$modelName) {
        $adminUser = Auth::guard('admin')->user();
        $model = 'App\\'.ucfirst($modelName);
        $model = new $model;
        $configs = $model->listingconfigs();
        $conditions = $model->getFilter($request, $configs);
        $records = $model->getRecords($conditions);
        return view('admin.user.manageruser',[
            'user'=>$adminUser,
            'records'=>$records,
            'configs'=>$configs,
            'title'=>$model->title,
            'modelName'=>$modelName,
            ]);
    }
    public function edit($id) {
        $adminUser = Auth::guard('admin')->user();
        $users = User::find($id);
        return view('admin.user.edit',[
            'users' =>$users,
            'user'=>$adminUser
        ]);
    }
    public function update(Request $request,$id) {
        $adminUser = Auth::guard('admin')->user();
        $users = User::find($id);
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->address = $request['address'];
        $users->phone = $request['phone'];
        $users->gender = $request['gender'];
        $users->save();
        $request->session()->flash('success', 'Cập nhật thành công !!!');
            return view('admin.user.edit',[
                'users'=>$users,
                'user'=>$adminUser
            ]); 
    }
    public function updatepw(Request $request,$id) {
        $adminUser = Auth::guard('admin')->user();
        $users = User::find($id);
                $users->password = Hash::make($request ['password']);
                $users->save();
                $request->session()->flash('successpw', 'Thiết lập thành công!!!');
                return redirect()->back();
                return view([
                    'user'=>$adminUser,
                    'users'=>$users
                ]);
    }
    public function create() {
        $adminUser = Auth::guard('admin')->user();
        return view('admin.user.create',[
            'user'=>$adminUser
        ]); 
    }
    public function createupdate(Request $request) {
      
        $adminUser = Auth::guard('admin')->user();
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->address = $request['address'];
        $user->phone = $request['phone'];
        $user->gender = $request['gender'];
        $user->password = Hash::make($request ['password']);
        $user->save();
        return redirect('/admin/Manager/User');
        return view([
            'user'=>$adminUser
        ]); 
    }
    public function delete($id) {
        $adminUser = Auth::guard('admin')->user();
        $users = User::find($id);
        $users->delete();
        return redirect()->back();
        return view([
            'users'=>$users,
            'user'=>$adminUser
            
            ]);
    }
}
