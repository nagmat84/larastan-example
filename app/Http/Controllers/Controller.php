<?php

namespace App\Http\Controllers;

use App\Database\NodeCollection;
use App\Models\Node;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	/**
	 * @return NodeCollection<Node>
	 */
	public function getSomething(): NodeCollection
	{
		$node = new Node();
		return $node->newModelQuery()->whereBetween('id', [1,2])->get();
	}
}
