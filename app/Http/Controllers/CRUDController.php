<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalInfo;
class CRUDController extends Controller
{
    public function index()
    {
    	return view('crud.index');
    }
}
