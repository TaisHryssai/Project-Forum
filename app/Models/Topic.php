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

    /**
     * @param string $term
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function search($term)
    {
        if ($term) {
            $searchTerm = "%{$term}%";
            return Topic::where('title', 'LIKE', $searchTerm)->orWhere('keywords', 'LIKE', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }
        return Topic::orderBy('created_at', 'desc')->paginate(5);
    }
}
