<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'ins_id';

    const CREATED_AT = 'ins_created';
    const UPDATED_AT = 'ins_updated';

    public function integrantes()
    {
        return $this->hasMany(Integrantes::class, 'ins_id', 'ins_id');
    }


    public function setInsEquipoAttribute($value)
    {
        $this->attributes['ins_equipo'] = trim(preg_replace('/\s+/', ' ', $value));
    }
}
