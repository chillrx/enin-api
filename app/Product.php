<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }

    public function subgroup()
    {
        return $this->hasOne(Subgroup::class, 'id', 'subgroup_id');
    }

}
