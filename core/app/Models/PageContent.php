<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtml;


class PageContent extends Model
{
    
   

    public function scopeActive($query){
        return $query->where('active', true);
    }
}
