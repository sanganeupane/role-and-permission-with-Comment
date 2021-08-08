<?php

namespace App\Models\LeadCompany;

use App\Models\Comment\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Leadcompany extends User
{

    protected $guarded='admin';
    protected $fillable= ['companyname','name','username','address','email','phone','service','deals','followup','handle'];

    public function leadId()
    {
        return $this->hasMany(Comment::class, 'lead_id','id');

    }
}
