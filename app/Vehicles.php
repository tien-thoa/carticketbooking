<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Base;
use App\Ticket;
class Vehicles extends Base
{
    protected $table = 'vehicles';
    public $timestamps = True;
    protected $fillable = [
        'garage','type','number_of_seats','image'
    ];
    public function tickets(){
        return $this->hasMany(Ticket::class, 'vehicles_id','id');
    }
    public $title = "Quản lý xe";
    public $titleadd = "Thêm xe";
    public function listingconfigs (){
        $defaultlistingconfigs = parent::defaultlistingconfigs();
        $listingconfigs = array (
            array (
                'field' => 'id',
                'name'  => 'ID',
                'type'  => 'text',
                'filter' => 'equal'
            ),
            array (
                'field' => 'garage',
                'name'  => 'Nhà xe',
                'type'  => 'text',
                'filter' => 'like'
            ),
            array (
                'field' => 'type',
                'name'  => 'Loại xe',
                'type'  => 'text',
                'filter' => 'equal'
            ),
            array (
                'field' => 'number_of_seats',
                'name'  => 'Số chỗ',
                'type'  => 'text',
                'filter' => 'equal'
            ),
            array (
                'field' => 'image',
                'name'  => 'Ảnh hãng xe',
                'type'  => 'image',
                'filter' => 'equal'
            ),
            );
            return array_merge($listingconfigs, $defaultlistingconfigs);
        
    }
}
