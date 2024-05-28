<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    public $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'uuid',
        'user_id',
        'title',
        'slug',
        'category_id',
        'category_multi',
        'description',
        'content',
        'thumbnail',
        'rank',
        'view',
        'status',
        'type',

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

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->select('id', 'uuid', 'title', 'slug');
    }

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'author_id')->select('id', 'uuid', 'title', 'slug');
    }

    public function productChapters()
    {
        return $this->hasMany(ProductChapter::class);
    }

    public function latestChapters()
    {
        return $this->productChapters()->select('id', 'uuid', 'title', 'rank', 'created_at')->orderBy('rank', 'desc')->limit(3);
    }

    public function listChapters()
    {
        return $this->productChapters()->select('id', 'title', 'rank', 'created_at')->orderBy('rank', 'asc');
    }

}
