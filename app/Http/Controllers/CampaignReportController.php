<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Category;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\LaporanCampaign;

class CampaignReportController extends Controller
{
    public function index($campaignId, $campaignTitle)
    {
        $PermissionRole = PermissionRole::getPermission('Campaign', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['campaignTitle'] = $campaignTitle;
        $data['getRecord'] = LaporanCampaign::getCampaignReportByCampaignId($campaignId);

        return view('panel.campaignReport.index', $data);
    }

    public function add()
    {
        $PermissionRole = PermissionRole::getPermission('Add Campaign', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['getPermission'] = Permission::getRecord();
        $data['getCategories'] = Category::getRecordActive();
        return view('panel.campaignReport.add', $data);
    }

    public function edit($id)
    {
        $PermissionRole = PermissionRole::getPermission('Edit Campaign', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        // $data['getRecord'] = Campaign::getSingle($id);
        // $data['getPermission'] = Permission::getRecord();
        // $data['getCategories'] = Category::getRecordActive();

        return view('panel.campaignReport.edit', $data);
    }
}
