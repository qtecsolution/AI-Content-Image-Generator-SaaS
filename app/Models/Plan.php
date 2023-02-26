<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;


    // public function userHasThisPlan()
    // {
    //     return $this->hasOneThrough(User::class, PlanExpanse::class,'plan_id','plan_expanse_id');
    // }
}
