<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;

    /**
    * @var array
    */
    protected $fillable = [
        'name', 'topic_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function topicKeyword()
    {
        return $this->hasOne(TopicKeyword::class, 'keyword_id');
    }
}
