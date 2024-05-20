<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model
{
    public $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'uuid',
        'parent_id',
        'user_id',
        'title',
        'slug',
        'thumbnail',
        'description',
        'content',
        'redirect_url',
        'fontawesome_icon',
        'rank',
        'type',
        'status',

        'title_seo',
        'meta_des',
        'meta_key',
    ];

    public $fillableSearchLike = [
        'title',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
