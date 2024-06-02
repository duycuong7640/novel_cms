<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Setting extends Model
{
    public $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'uuid',
        'user_id',
        'name',
        'email',
        'hotline',
        'address',
        'instagram',
        'facebook',
        'youtube',
        'google',
        'google_index',
        'telephone',
        'code_header',
        'code_body',
        'code_footer',
        'content_footer',
        'copyright',

        'title_seo',
        'meta_des',
        'meta_key',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
