<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyRepresentative extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['cpf_number', 'treatment', 'position', 'email', 'birthday', 'schooling', 'postal_code', 'address', 'city', 'state', 'name', 'participant_id'];

}
