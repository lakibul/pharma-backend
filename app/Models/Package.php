<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'type', 'price', 'duration', 'is_paid', 'tag', 'validity', 'validity_type'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
