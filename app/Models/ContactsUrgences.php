<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $nom
 * @property string $relation
 * @property string $telephone
 * @property User $user
 */
class ContactsUrgences extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'nom', 'relation', 'telephone'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
