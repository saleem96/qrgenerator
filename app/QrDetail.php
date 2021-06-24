<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrDetail extends Model
{
    protected $fillable = [
        'section', 'data', 'detail','user_id',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
