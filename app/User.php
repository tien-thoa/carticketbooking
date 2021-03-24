<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Ticket;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tickets(){
        return $this->hasMany(Ticket::class, 'users_id','id');
    }
    public $title = "Quản lý thành viên";
    public function getRecords($conditions) {
        $per_page = 7;
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
                'name'  => 'Địa chỉ email',
                'type'  => 'text',
                'filter' => 'like'
            ),
            array (
                'field' => 'address',
                'name'  => 'Địa chỉ ',
                'type'  => 'text',
                'filter' => 'like'
            ),
            array (
                'field' => 'phone',
                'name'  => 'Số điện thoại',
                'type'  => 'text',
                'filter' => 'equal'
            ),
            array (
                'field' => 'gender',
                'name'  => 'Giới tính',
                'type'  => 'text',
                'filter' => 'equal'
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
