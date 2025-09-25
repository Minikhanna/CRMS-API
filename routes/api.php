<?php

use App\Http\Controllers\API\AffiliateStatusController;
use App\Http\Controllers\API\AffiliateTypeController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CreditBureauController;
use App\Http\Controllers\API\CreditorController;
use App\Http\Controllers\API\DisputeReasonController;
use App\Http\Controllers\API\DisputeReasonGroupController;
use App\Http\Controllers\API\FolderController;
use App\Http\Controllers\API\FreezeBureauController;
use App\Http\Controllers\API\InstructionController;
use App\Http\Controllers\API\InstructionGroupController;
use App\Http\Controllers\API\LetterCategoryController;
use App\Http\Controllers\API\ProcessController;
use App\Http\Controllers\API\ProcessingQueueController;
use App\Http\Controllers\API\ReminderTypeController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('signup',[AuthController::class,'signup']);
Route::post('login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout',[AuthController::class,'logout']);
    Route::apiResource('affiliatestatus',AffiliateStatusController::class);
    Route::apiResource('affiliatetype',AffiliateTypeController::class);
    Route::apiResource('creditbureau',CreditBureauController::class);
    Route::apiResource('creditor',CreditorController::class);
    Route::apiResource('disputereason',DisputeReasonController::class);
    Route::apiResource('disputereasongroup',DisputeReasonGroupController::class);
    Route::apiResource('folder',FolderController::class);
    Route::apiResource('freezebureau',FreezeBureauController::class);
    Route::apiResource('instruction',InstructionController::class);
    Route::apiResource('instructiongroup',InstructionGroupController::class);
    Route::apiResource('lettercategory',LetterCategoryController::class);
    Route::apiResource('process',ProcessController::class);
    Route::apiResource('processingqueue',ProcessingQueueController::class);
    Route::apiResource('remindertype',ReminderTypeController::class);

});