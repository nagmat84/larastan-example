<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TKey of array-key
 * @template TModel of Model
 * @phpstan-extends EloquentCollection<int, TModel>
 */
class NodeCollection extends EloquentCollection
{

}
