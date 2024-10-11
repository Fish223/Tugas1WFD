<?php

use App\Http\Controllers\EventCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController; // Import OrganizerController

/*
|--------------------------------------------------------------------------|
| Web Routes                                                               |
|--------------------------------------------------------------------------|
| Here is where you can register web routes for your application. These   |
| routes are loaded by the RouteServiceProvider and all of them will be   |
| assigned to the "web" middleware group. Make something great!           |
|--------------------------------------------------------------------------|
*/

// Home route that shows all events
Route::get('/', [EventController::class, 'index']);

// Resource routes for events
Route::resource('events', EventController::class);

// Resource routes for organizers
Route::resource('organizers', OrganizerController::class); // Add this line

// Resource routes for event categories
Route::resource('event-categories', EventCategoryController::class);

// Custom route for the events page (use a different URI if needed)
Route::get('/events-page', [EventController::class, 'eventsPage'])->name('events.page'); // Change the URI to avoid conflict
Route::get('/event-details/{id}', [EventController::class, 'eventDetails'])->name('events.details');
