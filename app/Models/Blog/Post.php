<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'blog';

    protected $dates = [];
}
