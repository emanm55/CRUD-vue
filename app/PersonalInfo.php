<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
	protected $table ='personal_infos';
   protected $fillable = ['first_name', 'last_name'];
}
