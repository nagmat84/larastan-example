<?php

namespace App\Database;

use App\Models\Contracts\Node;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TNodeModel of Model&Node
 * @phpstan-extends EloquentCollection<array-key, TNodeModel>
 */
class NodeCollection extends EloquentCollection
{

}
