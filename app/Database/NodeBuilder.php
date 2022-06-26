<?php

namespace App\Database;

use App\Models\Contracts\Node;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TNodeModel of Model&Node
 * @phpstan-extends EloquentBuilder<TNodeModel>
 */
class NodeBuilder extends EloquentBuilder
{

}
