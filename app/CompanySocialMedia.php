<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanySocialMedia extends Model
{
    use SoftDeletes;
    
    protected $table = 'company_social_medias';
    protected $guarded = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
}
