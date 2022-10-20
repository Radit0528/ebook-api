<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me(){
        return [
            'Nis' => 3103120231,
            'Name' => 'Wisnu Rananta Raditya Putra',
            'Phone' => '085280407650',
            'Class' => 'XII RPL 7'
        ];
    }
}
