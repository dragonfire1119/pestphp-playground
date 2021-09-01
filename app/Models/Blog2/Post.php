<?php

namespace App\Models\Blog2;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'blog2';

    protected $dates = [];
}
