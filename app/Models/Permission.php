<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $type_permission_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $contenu
 * @property TypePermission $typePermission
 * @property User $user
 */
class Permission extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id','user_id', 'type_permission_id', 'objet', 'document', 'statut', 'created_at', 'updated_at', 'contenu'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typePermission()
    {
        return $this->belongsTo('App\Models\TypePermission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
