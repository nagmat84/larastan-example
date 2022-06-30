<?php

namespace App\Database;

use App\Models\Contracts\Node;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModelClass of Model&Node
 * @phpstan-extends EloquentCollection<array-key, TModelClass>
 */
class NodeCollection extends EloquentCollection
{

}
