<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    public $table = 'photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'uuid',
        'user_id',
        'title',
        'link',
        'thumbnail',
        'thumbnail2',
        'rank',
        'type',
        'status',
    ];

    public $fillableSearchLike = [
        'title',
        'type',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
