<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
                "first_name",
                "last_name",
                "email",
                "phone",
                "company_id",
                "created_at"];

    public function company()
    {
    	return $this->belongsTo('App\Models\Company','company_id');
    }
}
