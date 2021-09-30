<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    public $table = 'comment';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',        
        'email',
        'comment',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'news_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }


}
