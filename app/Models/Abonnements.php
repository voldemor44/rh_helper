<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $entreprise_id
 * @property string $tarif_id
 * @property string $date_debut
 * @property string $date_fin
 * @property string $created_at
 * @property string $updated_at
 * @property Tarif $tarif
 * @property Entreprise $entreprise
 */
class Abonnements extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['entreprise_id', 'tarif_id', 'date_debut', 'date_fin', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tarif()
    {
        return $this->belongsTo('App\Models\Tarif');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entreprise()
    {
        return $this->belongsTo('App\Models\Entreprise');
    }
}
