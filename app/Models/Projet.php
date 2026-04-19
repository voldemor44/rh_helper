<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $titre
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Evaluation[] $evaluations
 * @property ProjetUtilisateur[] $projetUtilisateurs
 * @property Tach[] $taches
 */
class Projet extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'titre', 'priorite', 'date_debut', 'date_fin_prevue', 'description', 'chef_projet', 'entreprise_id', 'created_at', 'updated_at', 'statut', 'path_document'];

    protected $keyType = 'string';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations()
    {
        return $this->hasMany('App\Models\Evaluation');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\DocumentsProjet');
    }

    public function taches()
    {
        return $this->hasMany('App\Models\Tache');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'projet_utilisateurs');
    }
}
