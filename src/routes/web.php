<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ParticipantTypeController;
use App\Http\Controllers\TeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// ========== TEAMS ==========
// returns the home page with all teams
Route::get('/', TeamController::class .'@index')->name('teams.index');
// returns the form for adding a team
Route::get('/teams/create', TeamController::class . '@create')->name('teams.create');
// adds a team to the database
Route::post('/teams', TeamController::class .'@store')->name('teams.store');
// returns a page that shows a full team
Route::get('/teams/{team}', TeamController::class .'@show')->name('teams.show');
// returns the form for editing a team
Route::get('/teams/{team}/edit', TeamController::class .'@edit')->name('teams.edit');
// updates a team
Route::put('/teams/{team}', TeamController::class .'@update')->name('teams.update');
// deletes a team
Route::delete('/teams/{team}', TeamController::class .'@destroy')->name('teams.destroy');
// ========== PARTICIPANTS ==========
// returns the page with all participants
Route::get('/participants', ParticipantController::class .'@index')->name('participants.index');
// returns the form for adding a participant
Route::get('/participants/create', ParticipantController::class . '@create')->name('participants.create');
// adds a participant to the database
Route::post('/participants', ParticipantController::class .'@store')->name('participants.store');
// returns a page that shows a full participant
Route::get('/participants/{participant}', ParticipantController::class .'@show')->name('participants.show');
// returns the form for editing a participant
Route::get('/participants/{participant}/edit', ParticipantController::class .'@edit')->name('participants.edit');
// updates a participant
Route::put('/participants/{participant}', ParticipantController::class .'@update')->name('participants.update');
// deletes a participant
Route::delete('/participants/{participant}', ParticipantController::class .'@destroy')->name('participants.destroy');
// ========== PARTICIPANT TYPES ==========
// returns the page with all participants
Route::get('/participanttypes', ParticipantTypeController::class .'@index')->name('participantTypes.index');
// returns the form for adding a participant
Route::get('/participanttypes/create', ParticipantTypeController::class . '@create')->name('participantTypes.create');
// adds a participant to the database
Route::post('/participanttypes', ParticipantTypeController::class .'@store')->name('participantTypes.store');
// returns a page that shows a full participant
Route::get('/participanttypes/{participanttype}', ParticipantTypeController::class .'@show')->name('participantTypes.show');
// returns the form for editing a participant
Route::get('/participanttypes/{participanttype}/edit', ParticipantTypeController::class .'@edit')->name('participantTypes.edit');
// updates a participant
Route::put('/participanttypes/{participanttype}', ParticipantTypeController::class .'@update')->name('participantTypes.update');
// deletes a participant
Route::delete('/participanttypes/{participanttype}', ParticipantTypeController::class .'@destroy')->name('participantTypes.destroy');
