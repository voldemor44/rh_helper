<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerDepartement extends Model
{
    use HasFactory;

    protected $fillable = ['manager_id', 'departement_id', 'created_at', 'updated_at'];

    public function manager()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function departements()
    {
        return $this->belongsTo('App\Models\Departement');
    }
}
