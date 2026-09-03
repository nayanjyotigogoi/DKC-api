<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = ['email', 'ip_address', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
