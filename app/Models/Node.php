<?php

namespace App\Models;

use App\Models\Concerns\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
	/** @phpstan-use NodeTrait<Node> */
	use NodeTrait;
}
