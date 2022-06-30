<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModelClass of Model
 * @phpstan-extends EloquentBuilder<TModelClass>
 */
class NodeBuilder extends EloquentBuilder
{

}
