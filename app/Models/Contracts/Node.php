<?php

namespace App\Models\Contracts;

use App\Database\NodeBuilder;
use App\Database\NodeCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as BaseBuilder;

/**
 * @template TNodeModel of Model&Node
 *
 * @property int $_lft
 * @property int $_rgt
 * @property int|string|null $parent_id
 * @property Node $parent
 * @phpstan-property TNodeModel $parent
 * @property NodeCollection<TNodeModel> $children
 */
interface Node
{
	public const PARENT_ID_NAME = 'parent_id';

	/**
	 * @param BaseBuilder $query
	 * @return NodeBuilder<TNodeModel>
	 */
	public function newEloquentBuilder($query);

	/**
	 * @return NodeBuilder<TNodeModel>
	 */
	public function newModelQuery();

	/**
	 * @param array $models
	 * @return NodeCollection<TNodeModel>
	 */
	public function newCollection(array $models = []): NodeCollection;

	/**
	 * Relation to the parent.
	 *
	 * @return BelongsTo<TNodeModel, TNodeModel>
	 */
	public function parent(): BelongsTo;

	/**
	 * Relation to children.
	 *
	 * @return HasMany<TNodeModel>
	 */
	public function children(): HasMany;

	/**
	 * Get query for siblings of the node.
	 *
	 * @return NodeBuilder<TNodeModel>
	 */
	public function siblings(): NodeBuilder;
}
