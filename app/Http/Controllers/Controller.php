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
	public function getSomething(): NodeCollection
	{
		return Node::query()->whereBetween('id', [1,2])->get();
	}
}
