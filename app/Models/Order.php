<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'devices' => 'array',
    ];

    public function send()
    {
        return $this->hasMany(My_order::class);
    }

    public function devices()
    {
        return $this->hasMany(Order_device::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function main()
    {
        return $this->belongsTo(Maintanance::class , 'maintanance_id' , 'id');
    }
}
