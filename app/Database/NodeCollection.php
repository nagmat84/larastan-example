<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TNodeModel of Model
 * @phpstan-extends EloquentCollection<array-key, TNodeModel>
 */
class NodeCollection extends EloquentCollection
{

}
