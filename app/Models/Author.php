<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Author extends Model
{
    public $table = 'authors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'uuid',
        'title',
        'slug',
        'content',
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

}
