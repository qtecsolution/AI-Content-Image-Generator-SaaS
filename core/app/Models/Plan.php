<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'word_count', 'max_words', 'document_count',
    'image_count','is_published','price','yearly_price','templates','support_enabled','code_generate_enabled','chat_enabled'];

}
