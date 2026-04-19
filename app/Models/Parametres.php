<?php

namespace App\Models;

use App\Models\Media;
use Ramsey\Uuid\Uuid;
use App\Models\ParametresMedias;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nom
 * @property string $adresse
 * @property string $pays
 * @property string $ville
 * @property string $etat
 * @property string $codePostal
 * @property string $email
 * @property string $telephone
 * @property string $fax
 * @property string $siteWeb
 * @property string $created_at
 * @property string $updated_at
 */
class Parametres extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'nom', 'adresse', 'pays', 'ville', 'etat', 'codePostal', 'email', 'telephone', 'fax', 'siteWeb', 'entreprise_id', 'created_at', 'updated_at'];

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

    public function image()
    {
        return $this->hasMany(ParametresMedias::class);
    }

    public function entreprise(){
        return $this->hasOne(Entreprise::class);
    }

}
