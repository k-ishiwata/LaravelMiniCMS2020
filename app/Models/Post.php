<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'is_public', 'published_at'
    ];

    protected $casts = [
        'is_public' => 'bool',
        'published_at' => 'datetime'
    ];


    /**
     * 公開のみ表示
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePublic(Builder $query)
    {
        return $query->where('is_public', true);
    }

    /**
     * 公開記事一覧取得
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePublicList(Builder $query)
    {
        return $query
            ->public()
            ->latest('published_at')
            ->paginate(10);
    }

    /**
     * 公開記事をIDで取得
     *
     * @param Builder $query
     * @param int $id
     * @return Builder
     */
    public function scopePublicFindById(Builder $query, int $id)
    {
        return $query->public()->findOrFail($id);
    }

    /**
     * 公開日を年月日で表示
     *
     * @return string
     */
    public function getPublishedFormatAttribute()
    {
        return $this->published_at->format('Y年m月d日');
    }

    /**
     * 公開ステータスをラベル表示
     *
     * @return string
     */
    public function getIsPublicLabelAttribute()
    {
        return $this->is_public ? '公開' : '非公開';
    }
}
