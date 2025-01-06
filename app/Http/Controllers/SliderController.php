<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Slider;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function list()
    {
        $PermissionRole = PermissionRole::getPermission('Slider', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['PermissionAdd'] = PermissionRole::getPermission('Add Slider', Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRole::getPermission('Edit Slider', Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRole::getPermission('Delete Slider', Auth::user()->role_id);

        $data['getRecord'] = Slider::getRecord();
        return view('panel.slider.list', $data);
    }

    public function add()
    {
        $PermissionRole = PermissionRole::getPermission('Add Slider', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['getPermission'] = Permission::getRecord();

        return view('panel.slider.add', $data);
    }

    public function insert(Request $request)
    {

        $PermissionRole = PermissionRole::getPermission('Add Slider', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $image = $request->file('image');
        $hashImage = $image->hashName();
        $image->storeAs('assets/img/sliders', $hashImage, 'public');

        Slider::insertRecord($hashImage, $request);

        return redirect('panel/slider')->with('success', "Slider successfully created");
    }

    public function edit($id)
    {
        $PermissionRole = PermissionRole::getPermission('Edit Slider', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['getRecord'] = Slider::getSingle($id);
        $data['getPermission'] = Permission::getRecord();;
        return view('panel.slider.edit', $data);
    }

    public function update($id, Request $request)
    {
        $PermissionRole = PermissionRole::getPermission('Edit Slider', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        if ($request->file('image') == '') {
            $slider = Slider::updateRecordWithoutImage($id, $request);
        } else {
            $slider = Slider::getSingle($id);

            $path = parse_url($slider->image, PHP_URL_PATH);
            $relativePath = str_replace('/storage/', '', $path);
            Storage::disk('public')->delete($relativePath);

            $image = $request->file('image');
            $hashImage = $image->hashName();
            $image->storeAs('assets/img/sliders', $hashImage, 'public');

            Slider::updateRecord($id, $hashImage, $request);
        }

        return redirect('panel/slider')->with('success', "Slider successfully created");
    }

    public function delete($id)
    {
        $PermissionRole = PermissionRole::getPermission('Delete Slider', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $slider = Slider::getSingle($id);

        $path = parse_url($slider->image, PHP_URL_PATH);
        $relativePath = str_replace('/storage/', '', $path);

        $slider->delete();
        Storage::disk('public')->delete($relativePath);

        return redirect('panel/slider')->with('success', "Slider successfully deleted");
    }
}
