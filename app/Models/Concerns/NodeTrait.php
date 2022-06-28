<?php

namespace App\Models\Concerns;

use App\Database\NodeBuilder;
use App\Database\NodeCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as BaseBuilder;

/**
 * @template TNodeModel of Model
 */
trait NodeTrait
{
	/**
	 * See {@link \Illuminate\Database\Eloquent\Model::newEloquentBuilder()}.
	 *
	 * @param BaseBuilder $query
	 * @return NodeBuilder<TNodeModel>
	 */
	public function newEloquentBuilder($query)
	{
		return new NodeBuilder($query);
	}

	/**
	 * @param array $models
	 * @return NodeCollection<TNodeModel>
	 */
	public function newCollection(array $models = []): NodeCollection
	{
		return new NodeCollection($models);
	}
}
