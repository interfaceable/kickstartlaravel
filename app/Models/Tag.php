<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    /** @use HasFactory<TagFactory> */
    use HasFactory,
        SoftDeletes;

    /**
     * Get all the kits that are assigned this tag.
     *
     * @return MorphToMany<Kit, $this>
     */
    public function kits(): MorphToMany
    {
        return $this->morphedByMany(Kit::class, 'taggable');
    }
}
