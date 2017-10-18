<?php

namespace Bjuppa\LaravelBlog\Contracts;

use Illuminate\Contracts\Support\Htmlable;

interface BlogEntry
{
    /**
     * Get the entry's unique slug for urls
     * @return string
     */
    public function getSlug(): string;

    /**
     * Get the entry's headline
     * @return string
     */
    public function getTitle(): string;

    /**
     * Get the entry's full body text with markup
     * @return Htmlable
     */
    public function getContent(): Htmlable;
}
