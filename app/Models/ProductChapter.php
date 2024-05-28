<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductChapter extends Model
{
    public $table = 'product_chapters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'id',
        'uuid',
        'product_id',
        'title',
        'slug',
        'content',
        'url_mtlnovel_com',
        'rank',
        'view',
        'is_crawler_chapter',
        'status',

        'title_seo',
        'meta_des',
        'meta_key',
    ];

    public $fillableSearchLike = [
        'title',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->select('id', 'uuid', 'title', 'slug', 'category_id');
    }

}
