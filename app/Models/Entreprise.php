<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $nom
 * @property string $email
 * @property string $motDePasse
 * @property string $telephone
 * @property string $pays
 * @property string $devise
 * @property integer $nombreProjets
 * @property integer $nombreEmployes
 * @property integer $nombreDossiers
 * @property integer $type_entreprise_id
 * @property string $created_at
 * @property string $updated_at
 * @property Abonnement[] $abonnements
 * @property AvisRecrutement[] $avisRecrutements
 * @property Contact[] $contacts
 * @property Departement[] $departements
 * @property Dossier[] $dossiers
 * @property Evenement[] $evenements
 * @property Fonction[] $fonctions
 * @property Parametre[] $parametres
 * @property Projet[] $projets
 * @property User[] $users
 */
class Entreprise extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
  //  protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
  //  public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['nom', 'email', 'motDePasse', 'telephone', 'pays', 'devise', 'nombreProjets', 'nombreEmployes', 'nombreDossiers', 'type_entreprise_id', 'created_at', 'updated_at'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function abonnements()
    {
        return $this->hasMany('App\Models\Abonnement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avisRecrutements()
    {
        return $this->hasMany('App\Models\AvisRecrutement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departements()
    {
        return $this->hasMany('App\Models\Departement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dossiers()
    {
        return $this->hasMany('App\Models\Dossier');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evenements()
    {
        return $this->hasMany('App\Models\Evenement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fonctions()
    {
        return $this->hasMany('App\Models\Fonction');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parametres()
    {
        return $this->hasMany('App\Models\Parametre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projets()
    {
        return $this->hasMany('App\Models\Projet');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function parametre()
    {

        return $this->belongsTo(Parametres::class);
    }

    // public function dossiers()
    // {
    //     return $this->hasMany(Dossier::class);
    // }
}
