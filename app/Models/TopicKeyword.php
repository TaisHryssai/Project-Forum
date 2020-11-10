<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicKeyword extends Model
{
    use HasFactory;

    /**
    * @var array
    */
    protected $fillable = [
        'topic_id', 'keyword_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function keyword()
    {
        return $this->belongsTo(Keyword::class, 'keyword_id');
    }
}
