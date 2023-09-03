<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_type extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type()
    {
        return $this->hasMany(Order_type_user::class , 'order_type_id' , 'id');
    }
}
