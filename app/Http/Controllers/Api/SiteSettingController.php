<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\DB;

class SiteSettingController extends Controller {
    public function index() {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        // Dynamic counts — override stored values with live DB figures
        $members      = DB::table('member_applications')->where('status', 'approved')->count();
        $events       = DB::table('events')->count();
        $gallery      = DB::table('gallery_photos')->count();

        $settings['members_count']  = $members . '+';
        $settings['events_count']   = max(6, $events) . '+';
        $settings['memories_count'] = (1500 + $gallery) . '+';
        // celebrations_count stays as stored in site_settings (manually managed)

        return response()->json($settings)
            ->header('Cache-Control', 'public, max-age=60, stale-while-revalidate=300');
    }
}
