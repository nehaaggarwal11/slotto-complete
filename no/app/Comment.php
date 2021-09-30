<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comments';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'news_id',
        'name',
        'email',
        'comment',
        'status',
        'created_at',
        'updated_at',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }


}
