<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $guest_id
 * @property string $endpoint
 * @property string $public_key
 * @property string $auth_token
 * @property string $subscribable_type
 * @property integer $subscribable_id
 * @property string $content_encoding
 * @property string $created_at
 * @property string $updated_at
 */
class PushSubscription extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'guest_id', 'endpoint', 'public_key', 'auth_token', 'subscribable_type', 'subscribable_id', 'content_encoding', 'created_at', 'updated_at'];


public function user(){
    return $this->belongsTo(User::class);
}

}
