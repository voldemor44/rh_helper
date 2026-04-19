<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Models\PushSubscription;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use NotificationChannels\WebPush\HasPushSubscriptions;
use Illuminate\Foundation\Auth\User as Authenticatable;




/**
 * @property integer $id
 * @property integer $statut_utilisateurs_id
 * @property integer $departement_id
 * @property integer $fonction_id
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $telephone
 * @property string $date_naissance
 * @property string $created_at
 * @property string $updated_at
 * @property Evaluation[] $evaluations
 * @property Evenement[] $evenements
 * @property Media[] $medias
 * @property Permission[] $permissions
 * @property ProjetUtilisateur[] $projetUtilisateurs
 * @property Tach[] $taches
 * @property UserRole[] $userRoles
 * @property Departement $departement
 * @property StatutUtilisateur $statutUtilisateur
 * @property Fonction $fonction
 */
class User extends Authenticatable implements MustVerifyEmail
{


    use HasApiTokens, HasFactory, Notifiable, HasPushSubscriptions;

    /**
     * @var array
     */
    protected $fillable = ['statut_utilisateur_id', 'departement_id', 'fonction_id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'telephone', 'date_naissance', 'created_at', 'updated_at'];


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
    public function evaluations()
    {
        return $this->hasMany('App\Models\Evaluation');
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
    public function media()
    {
        return $this->hasOne('App\Models\Media');
    }

    public function infospersonnelle()
    {
        return $this->hasOne('App\Models\InfosPersonelles');
    }

    public function contacturgences()
    {
        return $this->hasMany('App\Models\ContactsUrgences');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany('App\Models\Permission');
    }

    public function daily_reports()
    {
        return $this->hasMany('App\Models\DailyReport');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projetUtilisateurs()
    {
        return $this->hasMany('App\Models\ProjetUtilisateur');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taches()
    {
        return $this->hasMany('App\Models\Tach');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRoles()
    {
        return $this->hasMany('App\Models\UserRole');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statutUtilisateur()
    {
        return $this->belongsTo(StatutUtilisateur::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToEPus
     */
    public function fonction()
    {
        return $this->belongsTo('App\Models\Fonctions');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_utilisateurs');
    }

    public function updatePushSubscription($endpoint, $key, $token, $contentEncoding)
    {
        $pushSubscription = new PushSubscription();
        $pushSubscription->endpoint = $endpoint;
        $pushSubscription->public_key = $key;
        $pushSubscription->auth_token = $token;
        $pushSubscription->content_encoding = $contentEncoding; // Inclure le paramètre 'content_encoding'

        // Enregistrez ou associez le pushSubscription à l'utilisateur selon vos besoins
        $this->pushSubscriptions()->save($pushSubscription);
    }

    public function pushSubscriptions()
    {
        return $this->hasMany(PushSubscription::class);
    }

    public function dossiers()
    {
        return $this->hasMany(Dossier::class);
    }

    public function manager_departement()
    {
        return $this->hasMany('App\Models\ManagerDepartement');
    }

    public function entreprise()
    {
        return $this->belongsTo('App\Models\Entreprise');
    }
}
