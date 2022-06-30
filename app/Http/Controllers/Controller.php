<?php

namespace App\Http\Controllers;

use App\Database\NodeCollection;
use App\Models\Node;
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
}
