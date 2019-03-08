<?php namespace Syscover\Update\Models;

use Syscover\Admin\Models\Package;
use Syscover\Core\Models\CoreModel;

/**
 * Class Version
 * @package Syscover\Update\Models
 */

class Version extends CoreModel
{
	protected $table        = 'update_version';
    protected $fillable     = ['name', 'package_id', 'version', 'migration', 'config', 'query', 'publish'];
    public $with            = ['package'];

    public function scopeBuilder($query)
    {
        return $query
            ->join('admin_package', 'update_version.package_id', '=', 'admin_package.id')
            ->addSelect(
                'admin_package.*',
                'update_version.*',
                'admin_package.name as admin_package_name',
                'update_version.name as update_version_name',
                'admin_package.version as admin_package_version',
                'update_version.version as update_version_version'
            );
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
