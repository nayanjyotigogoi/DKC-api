<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\MagazineController;
use App\Http\Controllers\Api\GoodieController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\KoreanPhraseController;
use App\Http\Controllers\Api\FunFactController;
use App\Http\Controllers\Api\MediaPickController;
use App\Http\Controllers\Api\SiteSettingController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\CourseInterestController;
use App\Http\Controllers\Api\ClubMemberController;
use App\Http\Controllers\Api\ResourceController;
use App\Http\Controllers\Api\PressMentionController;
use App\Http\Controllers\Api\GoodieOrderController;
use App\Http\Controllers\Api\EventRegistrationController;
use App\Http\Controllers\Api\Learning\ModuleController;
use App\Http\Controllers\Api\Learning\LessonController;
use App\Http\Controllers\Api\Learning\VocabularyController;
use App\Http\Controllers\Api\Learning\GrammarController;
use App\Http\Controllers\Api\Learning\ConversationController;
use App\Http\Controllers\Api\Learning\SearchController;
use App\Http\Controllers\Api\Learning\QuizController;
use App\Http\Controllers\Api\Learning\CulturalNoteController;
use App\Http\Controllers\Api\Admin\LearningChapterController;
use App\Http\Controllers\Api\Admin\AuthController;

Route::prefix('v1')->group(function () {
    // Form submissions — strict rate limit (3/min per IP)
    Route::post('apply', [ApplicationController::class, 'store'])->middleware('throttle:apply');
    Route::post('event-register', [EventRegistrationController::class, 'store'])->middleware('throttle:apply');
    Route::post('course-interest', [CourseInterestController::class, 'store'])->middleware('throttle:apply');
    Route::post('contact', [ContactController::class, 'store'])->middleware('throttle:apply');
    Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])->middleware('throttle:apply');

    // Public read endpoints — moderate rate limit
    Route::middleware('throttle:public-read')->group(function () {
        Route::get('events', [EventController::class, 'index']);
        Route::get('events/{slug}', [EventController::class, 'show']);
        Route::get('gallery', [GalleryController::class, 'index']);
        Route::get('magazine', [MagazineController::class, 'index']);
        Route::get('magazine/pdf/stream', [MagazineController::class, 'pdfStream']);
        Route::get('magazine/{slug}/pdf-token', [MagazineController::class, 'pdfToken']);
        Route::get('magazine/{slug}', [MagazineController::class, 'show']);
        Route::get('goodies', [GoodieController::class, 'index']);
        Route::post('goodie-orders', [GoodieOrderController::class, 'store'])->middleware('throttle:apply');
        Route::get('members', [MemberController::class, 'index']);
        Route::get('club-members', [ClubMemberController::class, 'index']);
        Route::get('phrases', [KoreanPhraseController::class, 'index']);
        Route::get('phrases/featured', [KoreanPhraseController::class, 'featured']);
        Route::get('fun-facts', [FunFactController::class, 'index']);
        Route::get('media-picks', [MediaPickController::class, 'index']);
        Route::get('settings', [SiteSettingController::class, 'index']);
        Route::get('resources/categories', [ResourceController::class, 'categories']);
        Route::get('resources', [ResourceController::class, 'index']);
        Route::get('press-mentions', [PressMentionController::class, 'index']);

        // ── Chapter-based learning — public read ──────────────────────────
        Route::get('learning/chapters',        [LearningChapterController::class, 'publicIndex']);
        Route::get('learning/chapters/{slug}', [LearningChapterController::class, 'publicShow']);

        // ── Learning Platform — public read endpoints ──────────────────────
        Route::prefix('learning')->group(function () {
            Route::get('modules',                  [ModuleController::class, 'index']);
            Route::get('modules/{id}/lessons',     [ModuleController::class, 'lessons']);
            Route::get('lessons',                  [LessonController::class, 'index']);
            Route::get('lessons/{slug}',           [LessonController::class, 'show']);
            Route::get('vocabulary',               [VocabularyController::class, 'index']);
            Route::get('vocabulary/{id}',          [VocabularyController::class, 'show']);
            Route::get('grammar',                  [GrammarController::class, 'index']);
            Route::get('grammar/{id}',             [GrammarController::class, 'show']);
            Route::get('conversations',            [ConversationController::class, 'index']);
            Route::get('conversations/{id}',       [ConversationController::class, 'show']);
            Route::get('cultural-notes',           [CulturalNoteController::class, 'index']);
            Route::get('cultural-notes/{id}',      [CulturalNoteController::class, 'show']);
            Route::get('lessons/{slug}/quiz',      [QuizController::class, 'forLesson']);
            Route::get('search',                   SearchController::class);
        });
    });

    // ── Admin auth (public — no token needed) ─────────────────────────────────
    Route::post('admin/login', [AuthController::class, 'login']);

    // ── Admin routes — require auth (Sanctum token) ───────────────────────────
    Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('me',     [AuthController::class, 'me']);
        Route::prefix('learning/chapters')->group(function () {
            Route::get('/',           [LearningChapterController::class, 'index']);
            Route::get('{chapter}',   [LearningChapterController::class, 'show']);
            Route::patch('{chapter}', [LearningChapterController::class, 'updateChapter']);
            Route::post('{chapter}/items',         [LearningChapterController::class, 'createItem']);
            Route::post('{chapter}/conversations', [LearningChapterController::class, 'createConversation']);
        });
        Route::patch('learning/items/{item}',                      [LearningChapterController::class, 'updateItem']);
        Route::delete('learning/items/{item}',                     [LearningChapterController::class, 'deleteItem']);
        Route::post('learning/items/reorder',                      [LearningChapterController::class, 'reorderItems']);
        Route::patch('learning/conversations/{line}',              [LearningChapterController::class, 'updateConversation']);
        Route::delete('learning/conversations/{line}',             [LearningChapterController::class, 'deleteConversation']);
        Route::post('learning/conversations/reorder',              [LearningChapterController::class, 'reorderConversations']);
    });
});
