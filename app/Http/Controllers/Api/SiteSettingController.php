<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
class SiteSettingController extends Controller {
    public function index(Request $request) {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return response()->json($settings);
    }
}
