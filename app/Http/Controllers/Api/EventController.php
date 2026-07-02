<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
class EventController extends Controller {
    public function index(Request $request) {
        $query = Event::orderBy('date_iso', 'desc');
        if ($request->has('status')) $query->where('status', $request->status);
        return response()->json($query->get());
    }
    public function show(string $slug) {
        $event = Event::where('slug', $slug)->firstOrFail();
        return response()->json($event);
    }
}
