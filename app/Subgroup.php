<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subgroup extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }

}
