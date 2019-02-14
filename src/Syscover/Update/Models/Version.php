<?php namespace Syscover\Update\Models;

use Syscover\Admin\Models\Package;
use Syscover\Core\Models\CoreModel;

/**
 * Class Version
 * @package Syscover\Update\Models
 */

class Version extends CoreModel
{
	protected $table        = 'update_versions';
    protected $fillable     = ['name', 'package_id', 'version', 'migration', 'config', 'query', 'publish'];
    public $with            = ['package'];

    public function scopeBuilder($query)
    {
        return $query
            ->join('admin_package', 'update_versions.package_id', '=', 'admin_package.id')
            ->addSelect('admin_package.*', 'update_versions.*', 'admin_package.name as admin_package_name', 'update_versions.name as update_versions_name');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');

    }
}
