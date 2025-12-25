<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    static public function getRecord()
    {
        $permissions = Permission::all();
        $grouped = $permissions->groupBy('groupby');

        $result = array();
        foreach ($grouped as $groupby => $groupPermissions) {
            $first = $groupPermissions->first();
            $data = array();
            $data['id'] = $first->id;
            $data['name'] = $first->name;

            $group = array();
            foreach ($groupPermissions as $permission) {
                $dataG = array();
                $dataG['id'] = $permission->id;
                $dataG['name'] = $permission->name;
                $group[] = $dataG;
            }

            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;
    }

    static public function getPermissionGroup($groupby)
    {
        return Permission::where('groupby', '=', $groupby)->get();
    }

    static public function getSingle($id)
    {
        return Permission::find($id);
    }
}
