<?php

namespace Modules\ContentTypes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class ContentType
 * @package Modules\ContentTypes\Models
 */
class ContentType extends Model
{
    use HasSlug;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->slugsShouldBeNoLongerThan(50)
            ->usingSeparator('-')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return HasMany
     */
    public function nodes() : HasMany {
        return $this->hasMany(ContentNode::class);
    }
}
