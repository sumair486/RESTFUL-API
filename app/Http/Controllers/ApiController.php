<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiModel;

class ApiController extends Controller
{
    public function getapi()
    {
        $data=ApiModel::all();
        return ($data);

    }
}
