<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\KitFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kit extends Model
{
    /** @use HasFactory<KitFactory> */
    use HasFactory,
        SoftDeletes;

    /**
     * Get all the tags for the Kit.
     *
     * @return MorphToMany<Tag, $this>
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * {@inheritDoc}
     */
    protected function casts(): array
    {
        return [
            'is_official' => 'boolean',
        ];
    }
}
