<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTask extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'titre', 'contenu', 'assigned_by', 'statut', 'date_delai', 'user_id', 'created_at', 'updated_at'];
}
