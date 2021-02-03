<?php

namespace Modules\ContentTypes\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\ContentTypes\Database\factories\ContentNodeFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class ContentNode
 * @package Modules\ContentTypes\Models
 */
class ContentNode extends Model
{
    use HasFactory;
    use HasSlug;

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return ContentNodeFactory
     */
    protected static function newFactory()
    {
        return ContentNodeFactory::new();
    }

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
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(ContentType::class);
    }

    /**
     * @return BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
