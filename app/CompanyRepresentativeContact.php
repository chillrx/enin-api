<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyRepresentativeContact extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['phone_type_id', 'ddd', 'number', 'company_representative_id'];
}