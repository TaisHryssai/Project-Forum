<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    /**
    * @var array
    */
    protected $fillable = [
        'title', 'content', 'keywords', 'attachments', 'user_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function responses()
    {
        return $this->hasMany(Response::class, 'topic_id');
    }
}
