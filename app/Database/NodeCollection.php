<?php

namespace App\Database;

use App\Models\Contracts\Node;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TKey of array-key
 * @template TModel of Model&Node
 * @phpstan-extends EloquentCollection<TKey, TModel>
 */
class NodeCollection extends EloquentCollection
{

}
