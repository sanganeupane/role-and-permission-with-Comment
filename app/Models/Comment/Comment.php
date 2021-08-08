<?php

namespace App\Models\Comment;

use App\Models\AdminUser;
use App\Models\LeadCompany\Leadcompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Comment extends User
{
    protected $guarded='admin';

   protected $fillable=['comment','lead_id','posted_by'];


    public function postedBy()
    {
        return $this->belongsTo(AdminUser::class, 'posted_by','id');
    }
    public function leadId()
    {
        return $this->belongsTo(Leadcompany::class, 'lead_id','id');
    }
}
