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
use App\Http\Controllers\Api\CourseInterestController;
use App\Http\Controllers\Api\ResourceController;
use App\Http\Controllers\Api\EventRegistrationController;

Route::prefix('v1')->group(function () {
    // Form submissions — strict rate limit (3/min per IP)
    Route::post('apply', [ApplicationController::class, 'store'])->middleware('throttle:apply');
    Route::post('event-register', [EventRegistrationController::class, 'store'])->middleware('throttle:apply');
    Route::post('course-interest', [CourseInterestController::class, 'store'])->middleware('throttle:apply');
    Route::post('contact', [ContactController::class, 'store'])->middleware('throttle:apply');

    // Public read endpoints — moderate rate limit
    Route::middleware('throttle:public-read')->group(function () {
        Route::get('events', [EventController::class, 'index']);
        Route::get('events/{slug}', [EventController::class, 'show']);
        Route::get('gallery', [GalleryController::class, 'index']);
        Route::get('magazine', [MagazineController::class, 'index']);
        Route::get('magazine/{slug}', [MagazineController::class, 'show']);
        Route::get('goodies', [GoodieController::class, 'index']);
        Route::get('members', [MemberController::class, 'index']);
        Route::get('phrases', [KoreanPhraseController::class, 'index']);
        Route::get('fun-facts', [FunFactController::class, 'index']);
        Route::get('media-picks', [MediaPickController::class, 'index']);
        Route::get('settings', [SiteSettingController::class, 'index']);
        Route::get('resources/categories', [ResourceController::class, 'categories']);
        Route::get('resources', [ResourceController::class, 'index']);
    });
});
