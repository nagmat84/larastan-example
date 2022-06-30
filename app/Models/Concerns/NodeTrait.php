<?php

namespace App\Models\Concerns;

use App\Database\NodeBuilder;
use App\Database\NodeCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as BaseBuilder;

/**
 * @template TModelClass of Model
 */
trait NodeTrait
{
	/**
	 * See {@link \Illuminate\Database\Eloquent\Model::newEloquentBuilder()}.
	 *
	 * @param BaseBuilder $query
	 * @return NodeBuilder<TModelClass>
	 */
	public function newEloquentBuilder($query)
	{
		/** @phpstan-ignore-next-line  */
		return new NodeBuilder($query);
	}

	/**
	 * @param array $models
	 * @return NodeCollection<int, TModelClass>
	 */
	public function newCollection(array $models = []): NodeCollection
	{
		/** @phpstan-ignore-next-line  */
		return new NodeCollection($models);
	}
}
