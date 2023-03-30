<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','tags','slug','meta_description','user_id','is_published'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
