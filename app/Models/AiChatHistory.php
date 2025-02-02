<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiChatHistory extends Model
{
    use HasFactory;

    protected $fillable = ['chat_request','chat_response','user_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
