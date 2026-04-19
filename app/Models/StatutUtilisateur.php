<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $statut
 * @property User[] $users
 */
class StatutUtilisateur extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'statut'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
