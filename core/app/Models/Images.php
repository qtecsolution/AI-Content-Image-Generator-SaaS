<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable = ['prompt','size','image_path','user_id','old_image'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
