<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TNodeModel of Model
 * @phpstan-extends EloquentBuilder<TNodeModel>
 */
class NodeBuilder extends EloquentBuilder
{

}
