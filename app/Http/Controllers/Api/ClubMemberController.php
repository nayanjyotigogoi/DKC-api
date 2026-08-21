<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClubMemberController extends Controller
{
    public function index()
    {
        $members = DB::table('member_applications')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get([
                'full_name',
                'current_status',
                'institution',
                'department',
                'year_of_study',
                'created_at',
            ]);

        return response()->json($members)
            ->header('Cache-Control', 'public, max-age=60, stale-while-revalidate=300');
    }
}
