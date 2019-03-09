<?php namespace Syscover\Update\Services;

use Syscover\Core\Exceptions\ModelNotChangeException;
use Syscover\Core\Services\Service;
use Syscover\Update\Models\Version;

class VersionService extends Service
{
    public function store(array $data)
    {
        $this->validate($data, [
            'name'                  => 'required|between:2,255',
            'package_id'            => 'required|numeric|exists:admin_package,id',
            'version'               => 'required|max:20',
            'minimal_panel_version' => 'required|max:20'
        ]);

        return Version::create($data);
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'name'                  => 'required|between:2,255',
            'package_id'            => 'required|numeric|exists:admin_package,id',
            'version'               => 'required|max:20',
            'minimal_panel_version' => 'required|max:20'
        ]);

        $object = Version::findOrFail($id);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException();

        // save changes
        $object->save();

        return $object;
    }
}
