<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PersonalInfo;
class CRUDController extends Controller
{
    public function index()
    {
    	
    	return response()->json(PersonalInfo::all());
    }
    public function create(Request $request)
    {
    	$personalInfo = new PersonalInfo();
    	$personalInfo->first_name = $request->first_name;
    	$personalInfo->last_name = $request->last_name;
    	$personalInfo->save();
    	return $personalInfo;
    }
    public function update(Request $request, $info)
    {
    	$personalInfo = PersonalInfo::find($info);
    	$personalInfo->first_name = $request->first_name;
    	$personalInfo->last_name = $request->last_name;
    	$personalInfo->save();
    }
    public function delete(PersonalInfo $info)
    {
    	$info->delete();
    }
}
