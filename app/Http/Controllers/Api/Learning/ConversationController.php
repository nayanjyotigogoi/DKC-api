<?php

namespace App\Http\Controllers\Api\Learning;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\ConversationResource;
use App\Services\Learning\ConversationService;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function __construct(private readonly ConversationService $conversationService) {}

    public function index(Request $request)
    {
        $paginated = $this->conversationService->paginate(
            $request->only(['level', 'search'])
        );

        return ConversationResource::collection($paginated);
    }

    public function show(int $id)
    {
        $conversation = $this->conversationService->findById($id);
        return new ConversationResource($conversation);
    }
}
