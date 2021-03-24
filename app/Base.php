<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
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
    public function defaultlistingconfigs (){
        return array (
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
