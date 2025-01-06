<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Category;
use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function list()
    {
        $PermissionRole = PermissionRole::getPermission('Category', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['PermissionAdd'] = PermissionRole::getPermission('Add Category', Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRole::getPermission('Edit Category', Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRole::getPermission('Delete Category', Auth::user()->role_id);

        $data['getRecord'] = Category::getRecord();
        return view('panel.category.list', $data);
    }

    public function add()
    {
        $PermissionRole = PermissionRole::getPermission('Add Category', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['getPermission'] = Permission::getRecord();

        return view('panel.category.add', $data);
    }

    public function insert(Request $request)
    {

        $PermissionRole = PermissionRole::getPermission('Add Category', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $image = $request->file('image');
        $hashImage = $image->hashName();
        $image->storeAs('assets/img/categories', $hashImage, 'public');

        Category::insertRecord($hashImage, $request);

        return redirect('panel/category')->with('success', "Category successfully created");
    }

    public function edit($id)
    {
        $PermissionRole = PermissionRole::getPermission('Edit Category', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['getRecord'] = Category::getSingle($id);
        $data['getPermission'] = Permission::getRecord();;
        return view('panel.category.edit', $data);
    }

    public function update($id, Request $request)
    {
        $PermissionRole = PermissionRole::getPermission('Edit Category', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        if ($request->file('image') == '') {
            $category = Category::updateRecordWithoutImage($id, $request);
        } else {
            $category = Category::getSingle($id);

            $path = parse_url($category->image, PHP_URL_PATH);
            $relativePath = str_replace('/storage/', '', $path);
            Storage::disk('public')->delete($relativePath);

            $image = $request->file('image');
            $hashImage = $image->hashName();
            $image->storeAs('assets/img/categories', $hashImage, 'public');

            Category::updateRecord($id, $hashImage, $request);
        }

        return redirect('panel/category')->with('success', "Category successfully updated");
    }

    public function delete($id)
    {
        $PermissionRole = PermissionRole::getPermission('Delete Category', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $category = Category::getSingle($id);

        $path = parse_url($category->image, PHP_URL_PATH);
        $relativePath = str_replace('/storage/', '', $path);

        $category->delete();
        Storage::disk('public')->delete($relativePath);

        return redirect('panel/category')->with('success', "Category successfully deleted");
    }
}
