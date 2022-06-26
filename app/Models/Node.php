<?php

namespace App\Models;

use App\Models\Contracts\Node as NodeInterface;
use App\Models\Concerns\NodeTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @phpstan-implements NodeInterface<Node>
 */
class Node extends Model implements NodeInterface
{
	/** @phpstan-use NodeTrait<Node> */
	use NodeTrait;
}
