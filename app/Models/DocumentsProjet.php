<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentsProjet extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'projet_id', 'path_document', 'nom', 'extension', 'taille', 'created_at', 'updated_at'];

    public function projet()
    {
        return $this->belongsTo('App\Models\Projet');
    }
}
