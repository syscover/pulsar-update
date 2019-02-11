<?php namespace Syscover\Update\Models;

use Syscover\Core\Models\CoreModel;

/**
 * Class Version
 * @package Syscover\Update\Models
 */

class Version extends CoreModel
{
	protected $table        = 'update_versions';
    protected $fillable     = ['package_id', 'version','name'];
}
