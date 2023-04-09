<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UseCase extends Model
{
    use HasFactory;

    protected $fillable = ['title','icon','details','prompt','use_case_category_id','is_popular','title_label','short_description_label','description_label','is_published'];

    public function category()
    {
        return $this->belongsTo(UseCaseCategory::class,'use_case_category_id','id');
    }
}
