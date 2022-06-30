<?php

namespace App\Models\Contracts;

use App\Database\NodeBuilder;
use App\Database\NodeCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as BaseBuilder;

/**
 * @template TModelClass of Model&Node
 *
 * @property int $_lft
 * @property int $_rgt
 * @property int|string|null $parent_id
 * @property Node $parent
 * @phpstan-property TModelClass $parent
 * @property NodeCollection<int, TModelClass> $children
 */
interface Node
{
	public const PARENT_ID_NAME = 'parent_id';

	/**
	 * @param BaseBuilder $query
	 * @return NodeBuilder<TModelClass>
	 */
	public function newEloquentBuilder($query);

	/**
	 * @return NodeBuilder<TModelClass>
	 */
	public function newModelQuery();

	/**
	 * @param array $models
	 * @return NodeCollection<int, TModelClass>
	 */
	public function newCollection(array $models = []): NodeCollection;

	/**
	 * Get query for siblings of the node.
	 *
	 * @return NodeBuilder<TModelClass>
	 */
	public function siblings(): NodeBuilder;
}
