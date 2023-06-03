<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['name','code','min_purchase','max_discount','type','discount_value','start_date','end_date','is_published','user_id'];
}
