<?php

namespace App\Database;

use App\Models\Contracts\Node;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModelClass of Model&Node
 * @phpstan-extends EloquentBuilder<TModelClass>
 */
class NodeBuilder extends EloquentBuilder
{

}
