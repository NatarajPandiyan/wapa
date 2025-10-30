<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
      protected $fillable = ['company_name','phone_number_id','wapa_id','logo','brand_name'];
      
}
