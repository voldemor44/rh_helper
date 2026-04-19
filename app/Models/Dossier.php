<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Models\TypeDossier;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type_dossier_id
 * @property integer $status_dossier_id
 * @property string $title
 * @property string $path
 * @property string $date_creation
 * @property string $date_debut
 * @property string $date_fin
 * @property string $pieces_jointes
 * @property string $created_at
 * @property string $updated_at
 * @property TypeDossier $typeDossier
 * @property StatusDossier $statusDossier
 */
class Dossier extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id','nom','type_dossier_id', 'status_dossier_id', 'title', 'path', 'date_creation', 'date_debut', 'date_fin', 'pieces_jointes', 'created_at', 'updated_at'];


    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeDossier()
    {
        return $this->belongsTo(TypeDossier::class, 'type_dossier_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusDossier()
    {
        return $this->belongsTo('App\Models\StatusDossier');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
