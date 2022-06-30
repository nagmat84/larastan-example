<?php

namespace App\Http\Controllers;

use App\Database\NodeCollection;
use App\Models\Node;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	/**
	 * @return NodeCollection<int, Node>
	 */
	public function getSiblings(): NodeCollection
	{
		/** @var Node $node */
		$node = Node::query()->find(42);
		return $node->siblings()->whereBetween('id', [1,2])->get();
	}

	/**
	 * @return Node|null
	 */
	public function getParent(): ?Node
	{
		/** @var Node $node */
		$node = Node::query()->find(42);
		return $node->parent()->findOrFail('17');
	}

	/**
	 * @return NodeCollection<int, Node>
	 */
	public function getChildren(): NodeCollection
	{
		/** @var Node $node */
		$node = Node::query()->find(42);
		return $node->children()->whereBetween('id', [1,2])->get();
	}

	/**
	 * @return HasMany<Node>
	 */
	public function getRestrictedChildrenRelation(): HasMany
	{
		/** @var Node $node */
		$node = Node::query()->find(42);
		return $node->children()->whereBetween('id', [1,2]);
	}
}
