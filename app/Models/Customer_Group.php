<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Group extends Model
{
    use HasFactory;

    protected $table = 'customer_group';
    public function customers()
    {
        return $this->hasMany(customer::class,'group_id');
    }
}
