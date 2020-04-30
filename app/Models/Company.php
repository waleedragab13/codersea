<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $fillable = [
                "name",
                "email",
                "logo",
                "website",
                "created_at"];

    public function employees()
    {
    	return $this->hasMany('App/Models/Employee','company_id');
    }
}
