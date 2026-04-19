<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property integer $id
 * @property integer $type_contact_id
 * @property string $nom
 * @property string $telephone
 * @property string $email
 * @property string $fonction
 * @property string $Entreprise
 * @property string $created_at
 * @property string $updated_at
 * @property TypeContact $typeContact
 */
class Contact extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'contacts';

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
     * @var array
     */
    protected $fillable = ['type_contact_id', 'nom', 'telephone', 'email', 'fonction', 'Entreprise','entreprise_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeContact()
    {
        return $this->belongsTo('App\Models\TypeContact');
    }
}
