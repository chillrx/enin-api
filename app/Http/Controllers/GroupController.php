<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{

    public function getAll() {
        return Group::get();
    }

}
