<?php

namespace App\Http\Controllers\Api\Learning;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\ModuleResource;
use App\Http\Resources\Learning\LessonCardResource;
use App\Models\Learning\LearningModule;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = LearningModule::where('status', 'published')
                                 ->orderBy('order_index')
                                 ->withCount(['lessons' => fn ($q) => $q->where('status', 'published')])
                                 ->get();

        return ModuleResource::collection($modules);
    }

    public function lessons(int $id)
    {
        $module = LearningModule::where('status', 'published')->findOrFail($id);

        $lessons = $module->publishedLessons()
                         ->withCount(['vocabulary', 'grammar', 'conversations', 'quizQuestions'])
                         ->get();

        return LessonCardResource::collection($lessons);
    }
}
