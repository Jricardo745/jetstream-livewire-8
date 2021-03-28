<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Course
 * @property string $description
 */
class Course extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }


    public function similar(): Collection
    {
        return Course::query()
            ->where('category_id', $this->category_id)
            ->limit(2)
            ->get();
    }

    public function getExcerptAttribute(): string
    {
        return substr($this->description, 0, 80) . '...';
    }
}
