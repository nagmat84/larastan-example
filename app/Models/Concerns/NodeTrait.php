<?php

namespace App\Models\Concerns;

use App\Database\NodeBuilder;
use App\Database\NodeCollection;
use App\Models\Contracts\Node;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as BaseBuilder;

/**
 * @template TNodeModel of Model&Node
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
	 * See {@link \Illuminate\Database\Eloquent\Concerns\HasAttributes::getAttribute()}.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	abstract public function getAttribute($key);

	/**
	 * See {@link \Illuminate\Database\Eloquent\Model::newModelQuery()}.
	 *
	 * @return NodeBuilder<TNodeModel>
	 */
	abstract public function newModelQuery();

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

	/**
	 * Get query for siblings of the node.
	 *
	 * @return NodeBuilder<TNodeModel>
	 */
	public function siblings(): NodeBuilder
	{
		return $this->newModelQuery()
			->where($this->getKeyName(), '<>', $this->getKey())
			->where(Node::PARENT_ID_NAME, '=', $this->getAttribute(Node::PARENT_ID_NAME));
	}
}
