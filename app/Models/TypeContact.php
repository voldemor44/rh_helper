<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $type

 */
class TypeContact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_contacts';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }


}
