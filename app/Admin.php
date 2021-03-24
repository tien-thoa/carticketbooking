<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable ;
use App\Base;
class Admin extends Authenticatable
{
    use Notifiable;
    protected $gaurd = 'admins';
    protected $fillable = [
        'name','email','password',
    ];
    protected $hidden = [
        'password','remember_token',
    ];
    public $title = "Quản trị viên";
    public $titleadd = "Thêm trị viên";
    public function getRecords($conditions) {
        $per_page = 5;
        return self::where($conditions)->paginate($per_page);
    }
    public function getFilter($request, $configs) {
        $conditions = [];
        if($request->method()=="POST") {
            foreach ($configs as $config) {
                if(!empty($config['filter'])) {
                    $value = $request->input($config['field']);
                    switch ($config['filter']) {
                        case "equal":
                            if(!empty($value)){
                                $conditions[] = [
                                    'field' => $config['field'],
                                    'condition' => '=',
                                    'value' => $value
                                ];
                            }
                            break;
                        case "like":
                            if(!empty($value)) {
                            $conditions[] = [
                                'field' => $config['field'],
                                'condition' => 'like',
                                'value' => '%' . $value . '%'
                            ];
                            break;
                            }
                    }
                }
            }
        }
        return $conditions;
    } 
    public function listingconfigs (){
       return array (
            array (
                'field' => 'id',
                'name'  => 'ID',
                'type'  => 'text',
                'filter' => 'equal'
            ),
            array (
                'field' => 'name',
                'name'  => 'Tên',
                'type'  => 'text',
                'filter' => 'like'
            ),
            array (
                'field' => 'email',
                'name'  => 'Địa chỉ email quản trị viên',
                'type'  => 'text',
                'filter' => 'like'
            ),
            array (
                'field' => 'created_at',
                'name'  => 'Ngày tạo',
                'type'  => 'text'
            ),
            array (
                'field' => 'updated_at',
                'name'  => 'Ngày cập nhật',
                'type'  => 'text'
            ),
            array (
                'field' => 'edit',
                'name'  => 'Sửa',
                'type'  => 'edit'
            ),
            array (
                'field' => 'delete',
                'name'  => 'Xóa',
                'type'  => 'delete'
            ),
            array (
                'field' => 'created_at',
                'name'  => 'Ngày tạo',
                'type'  => 'text'
            ),
            array (
                'field' => 'updated_at',
                'name'  => 'Ngày cập nhật',
                'type'  => 'text'
            ),
            array (
                'field' => 'edit',
                'name'  => 'Sửa',
                'type'  => 'edit'
            ),
            array (
                'field' => 'delete',
                'name'  => 'Xóa',
                'type'  => 'delete'
            ),
            );
    }
}
