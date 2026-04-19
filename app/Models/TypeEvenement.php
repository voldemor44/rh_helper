<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property Evenement[] $evenements
 */
class TypeEvenement extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evenements()
    {
        return $this->hasMany('App\Models\Evenement');
    }
}
