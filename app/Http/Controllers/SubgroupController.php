<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subgroup;

class SubgroupController extends Controller
{

    public function getAll() {
        return Subgroup::get();
    }

}
