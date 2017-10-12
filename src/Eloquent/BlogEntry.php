<?php

namespace Bjuppa\LaravelBlog\Eloquent;

use Bjuppa\LaravelBlog\Contracts\BlogEntry as BlogEntryContract;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property string slug
 * @property string headline
 */
class BlogEntry extends Eloquent implements BlogEntryContract
{
    use HasSlug;

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        if (!isset($this->table)) {
            //TODO: Should the entry model's table name come from a config file specific to the eloquent blog entries?
            return config('blog.eloquent_entries_table', 'blog_entries');
        }

        return $this->table;
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        //TODO: allow slug to update until the blog post has been published
        return SlugOptions::create()
            ->generateSlugsFrom('headline')
            ->saveSlugsTo($this->getRouteKeyName())
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Get the entry's unique slug for urls
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Get the entry's headline
     * @return string
     */
    public function getHeadline(): string
    {
        return $this->headline;
    }
}
