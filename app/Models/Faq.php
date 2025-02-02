<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = ['question','answer','priority','user_id','is_published'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
