<?php namespace Syscover\Update\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Update
 * @package Syscover\Update\Models
 */

class Update extends CoreModel
{
	protected $table        = 'update_updates';
    protected $fillable     = ['start_version', 'end_version', 'license'];
}
