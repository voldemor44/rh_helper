<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $manager_id
 * @property string $departement_id
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Departement $departement
 */
class ManagerDepartements extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['manager_id', 'departement_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'manager_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }
}
