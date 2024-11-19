<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Integrantes extends Model
{
    
    protected $guarded = [];
    protected $primaryKey = 'int_id';

    const CREATED_AT = 'int_created';
    const UPDATED_AT = 'int_updated';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
