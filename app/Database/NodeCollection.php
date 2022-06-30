<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModelClass of Model
 * @phpstan-extends EloquentCollection<array-key, TModelClass>
 */
class NodeCollection extends EloquentCollection
{

}
