<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $date_de_naissance
 * @property string $adresse
 * @property string $genre
 * @property string $numero_ifu
 * @property string $nationalite
 * @property string $religion
 * @property string $etat_civil
 * @property string $age_actuel
 * @property string $n_compte_bancaire
 * @property User $user
 */
class InfosPersonelles extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'infos_personnelles';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'date_de_naissance', 'adresse', 'genre', 'numero_ifu', 'nationalite', 'religion', 'etat_civil', 'age_actuel', 'n_compte_bancaire'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
