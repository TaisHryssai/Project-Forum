<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    /**
    * @var array
    */
    protected $fillable = [
        'file', 'attachmentable_type', 'attachmentable_id', 'topic_id', 'response_id'
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
    public function response()
    {
        return $this->belongsTo(Response::class, 'response_id');
    }
}
