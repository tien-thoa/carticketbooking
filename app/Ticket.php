<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Base;
use App\User;
use App\Vehicles;
class Ticket extends Base
{
    protected $table = 'tickets';
    public $timestamps = True;
    protected $fillable = [
        'number','users_id','vehicles_id','awaycome','destination','departure_time','arrival_time','price','pick_up_point',
    ];
    public function users(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function vehicles(){
        return $this->hasOne(Vehicles::class, 'id', 'vehicles_id');
    }
    public $title = "Quản lý vé";
    public $titleadd = "Thêm vé";
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
                'field' => 'number',
                'name'  => 'Số vé',
                'type'  => 'number',
                'filter' => 'equal'
            ),
            array (
                'field' => 'users_id',
                'name'  => 'ID user',
                'type'  => 'text',
                'filter' => 'equal'
            ),
            array (
                'field' => 'vehicles_id',
                'name'  => 'ID vehicles',
                'type'  => 'text',
                'filter' => 'equal'
            ),
            array (
                'field' => 'awaycome',
                'name'  => 'Đi từ',
                'type'  => 'text',
            ),
            array (
                'field' => 'destination',
                'name'  => 'Điểm đến',
                'type'  => 'text'
            ),
            array (
                'field' => 'departure_time',
                'name'  => 'Ngày đi',
                'type'  => 'text'
            ),
            array (
                'field' => 'arrival_time',
                'name'  => 'Ngày đến',
                'type'  => 'text'
            ),
            array (
                'field' => 'price',
                'name'  => 'Giá vé',
                'type'  => 'text',
            ),
            );
            return array_merge($listingconfigs, $defaultlistingconfigs);
        }
    
}
