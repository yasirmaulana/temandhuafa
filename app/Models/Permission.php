<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    static public function getRecord()
    {
        $getPermission = Permission::groupBy('groupby')->get();
        $result = array();
        foreach ($getPermission as $value) {
            $data = array();
            $data['id'] = $value->id;
            $data['name'] = $value->name;

            $group = array();
            $getPermissionGroup = Permission::getPermissionGroup($value->groupby);
            foreach ($getPermissionGroup as $valueG) {
                $dataG = array();
                $dataG['id'] = $valueG->id;
                $dataG['name'] = $valueG->name;
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
        return Role::find($id);
    }
}
