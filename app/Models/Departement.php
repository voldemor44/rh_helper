<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $nom
 * @property User[] $users
 */
class Departement extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id','created_at', 'updated_at', 'nom', 'entreprise_id'];

    protected $table = 'departements';


    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
