<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function list()
    {
        $PermissionRole = PermissionRole::getPermission('Campaign', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['PermissionAdd'] = PermissionRole::getPermission('Add Campaign', Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRole::getPermission('Edit Campaign', Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRole::getPermission('Delete Campaign', Auth::user()->role_id);

        if (Auth::user()->role_id == 1) {
            $data['getRecord'] = Campaign::getCampaigns();
        } else {
            $data['getRecord'] = Campaign::getCampaignByUserId(Auth::user()->id);
        }

        return view('panel.campaign.list', $data);
    }

    public function add()
    {
        $PermissionRole = PermissionRole::getPermission('Add Campaign', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['getPermission'] = Permission::getRecord();
        $data['getCategories'] = Category::getRecordActive();
        return view('panel.campaign.add', $data);
    }

    public function insert(Request $request)
    {

        $PermissionRole = PermissionRole::getPermission('Add Campaign', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $image = $request->file('image');
        $hashImage = $image->hashName();
        $image->storeAs('assets/img/campaigns', $hashImage, 'public');

        $request['status'] = "pending";
        $request['fundraiser_id'] = Auth::user()->id;
        $request['start_date'] = now()->format('Y-m-d');;
        $request['slug'] = Str::slug($request->title, '-');

        Campaign::insertRecord($hashImage, $request);

        return redirect('panel/campaign')->with('success', "Campaign successfully created");
    }

    public function approve($id)
    {
        Campaign::approve($id);

        return redirect('panel/campaign')->with('success', "Campaign approved");
    }

    public function complate($id)
    {
        Campaign::complate($id);

        return redirect('panel/campaign')->with('success', "Campaign complated");
    }

    public function edit($id)
    {
        $PermissionRole = PermissionRole::getPermission('Edit Campaign', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['getRecord'] = Campaign::getSingle($id);
        $data['getPermission'] = Permission::getRecord();
        $data['getCategories'] = Category::getRecordActive();

        return view('panel.campaign.edit', $data);
    }

    public function update($id, Request $request)
    {
        $PermissionRole = PermissionRole::getPermission('Edit Campaign', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        if ($request->file('image') == '') {
            $campaign = Campaign::updateRecordWithoutImage($id, $request);
        } else {
            $campaign = Campaign::getSingle($id);

            $path = parse_url($campaign->image, PHP_URL_PATH);
            $relativePath = str_replace('/storage/', '', $path);
            Storage::disk('public')->delete($relativePath);

            $image = $request->file('image');
            $hashImage = $image->hashName();
            $image->storeAs('assets/img/campaigns', $hashImage, 'public');

            Campaign::updateRecord($id, $hashImage, $request);
        }

        return redirect('panel/campaign')->with('success', "Category successfully updated");
    }
}
