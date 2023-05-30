<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanExpense extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'order_id', 'plan_id','word_count','current_word_count', 'document_count',
    'current_document_count','image_count','current_image_count','type','activated_at','expire_at'];
    public function plan(){
        return $this->belongsTo(Plan::class,'plan_id','id');
    }
}
