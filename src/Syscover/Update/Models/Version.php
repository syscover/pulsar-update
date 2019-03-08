<?php namespace Syscover\Update\Models;

use Carbon\Carbon;
use Syscover\Admin\Models\Package;
use Syscover\Core\Models\CoreModel;

/**
 * Class Version
 * @package Syscover\Update\Models
 */

class Version extends CoreModel
{
	protected $table        = 'update_version';
    protected $fillable     = ['name', 'package_id', 'version', 'minimal_panel_version', 'composer', 'publish', 'migration', 'query', 'provide', 'provide_from'];
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

    // Accessors
    public function getProvideFromAttribute($value)
    {
        // https://es.wikipedia.org/wiki/ISO_8601
        // return (new Carbon($value))->toW3cString();
        return $value ? (new Carbon($value))->format('Y-m-d\TH:i:s') : null;
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
