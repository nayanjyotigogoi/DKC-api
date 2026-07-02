<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller {
    public function index(Request $request) {
        // ?type=team → core team, ?type=spotlight → homepage spotlight
        if ($request->type === 'team') {
            return response()->json(
                Member::where('is_team', true)->where('is_active', true)->orderBy('sort_order')->get()
            );
        }
        return response()->json(
            Member::where('is_spotlight', true)->where('is_active', true)->orderBy('sort_order')->get()
        );
    }
}
