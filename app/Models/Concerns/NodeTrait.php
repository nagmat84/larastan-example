<?php

namespace App\Models\Concerns;

use App\Database\NodeBuilder;
use App\Database\NodeCollection;
use App\Models\Contracts\Node;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as BaseBuilder;

/**
 * @template TModelClass of Model&Node
 */
trait NodeTrait
{
	/**
	 * See {@link Model::getKey()}.
	 *
	 * @return mixed
	 */
	abstract public function getKey();

	/**
	 * See {@link Model::getKeyName()}.
	 *
	 * @return string
	 */
	abstract public function getKeyName();

	/**
	 * See {@link \Illuminate\Database\Eloquent\Concerns\HasRelationships::belongsTo()}.
	 *
	 * @param  string  $related
	 * @param  string|null  $foreignKey
	 * @param  string|null  $ownerKey
	 * @param  string|null  $relation
	 * @return BelongsTo<TModelClass>
	 */
	abstract public function belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null);

	/**
	 * See {@link \Illuminate\Database\Eloquent\Concerns\HasRelationships::hasMany()}.
	 *
	 * @param string $related
	 * @param string|null $foreignKey
	 * @param string|null  $localKey
	 * @return HasMany<TModelClass>
	 */
	abstract public function hasMany($related, $foreignKey = null, $localKey = null);

	/**
	 * See {@link \Illuminate\Database\Eloquent\Concerns\HasAttributes::getAttribute()}.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	abstract public function getAttribute($key);

	/**
	 * See {@link \Illuminate\Database\Eloquent\Model::newModelQuery()}.
	 *
	 * @return NodeBuilder<TModelClass>
	 */
	abstract public function newModelQuery();

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
	 * @return NodeCollection<TModelClass>
	 */
	public function newCollection(array $models = []): NodeCollection
	{
		/** @phpstan-ignore-next-line  */
		return new NodeCollection($models);
	}

	/**
	 * Relation to the parent.
	 *
	 * @return BelongsTo<TModelClass, TModelClass>
	 */
	public function parent(): BelongsTo
	{
		return $this->belongsTo(get_class($this), Node::PARENT_ID_NAME)
			->setModel($this);
	}

	/**
	 * Relation to children.
	 *
	 * @return HasMany<TModelClass>
	 */
	public function children(): HasMany
	{
		return $this->hasMany(get_class($this), Node::PARENT_ID_NAME)
			->setModel($this);
	}

	/**
	 * Get query for siblings of the node.
	 *
	 * @return NodeBuilder<TModelClass>
	 */
	public function siblings(): NodeBuilder
	{
		return $this->newModelQuery()
			->where($this->getKeyName(), '<>', $this->getKey())
			->where(Node::PARENT_ID_NAME, '=', $this->getAttribute(Node::PARENT_ID_NAME));
	}
}
