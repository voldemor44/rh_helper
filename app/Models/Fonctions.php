<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $departement_id
 * @property string $nom
 * @property string $created_at
 * @property string $updated_at
 * @property Departement $departement
 * @property User[] $users
 */
class Fonctions extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'departement_id', 'entreprise_id', 'nom', 'created_at', 'updated_at'];

    protected $table = 'fonctions';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
