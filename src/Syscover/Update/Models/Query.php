<?php namespace Syscover\Update\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Query
 * @package Syscover\Update\Models
 */

class Query extends CoreModel
{
	protected $table        = 'update_queries';
    protected $fillable     = ['version_id', 'query','sort'];
}
