<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $fillable = ['membership_id', 'amount', 'date'];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
