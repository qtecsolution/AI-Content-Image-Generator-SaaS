<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;



    protected $fillable = ['user_id', 
    'name', 'word_count', 'call_api_count', 
    'documet_count', 'lang','image_count','is_published','price'];

    // public function userHasThisPlan()
    // {
    //     return $this->hasOneThrough(User::class, PlanExpense::class,'plan_id','plan_expense_id');
    // }
}
