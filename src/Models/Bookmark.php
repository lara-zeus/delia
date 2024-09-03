<?php

namespace LaraZeus\Delia\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $bookmarkable_resource.
 */
class Bookmark extends Model
{
    protected $guarded = [];

    protected $casts = [
        //
    ];

    public function getTable(): string
    {
        return config('zeus-delia.table-prefix') . 'bookmarks';
    }
}
