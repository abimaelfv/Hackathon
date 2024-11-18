<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{

    use HasFactory;
    
    protected $guarded = [];
    protected $primaryKey = 'per_id';

    const CREATED_AT = 'per_created';
    const UPDATED_AT = 'per_updated';

}
