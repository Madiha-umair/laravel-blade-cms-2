<?php

use App\Models\Project;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QualificationsController;
use App\Http\Controllers\ExperiencesController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes    
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'projects' => Project::all(),
    ]);
});

Route::get('/project/{project:slug}', function (Project $project) {
    return view('project', [
        'project' => $project,
    ]);
})->where('project', '[A-z\-]+');

Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

Route::get('/console/projects/list', [ProjectsController::class, 'list'])->middleware('auth');
Route::get('/console/projects/add', [ProjectsController::class, 'addForm'])->middleware('auth');
Route::post('/console/projects/add', [ProjectsController::class, 'add'])->middleware('auth');
Route::get('/console/projects/edit/{project:id}', [ProjectsController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/edit/{project:id}', [ProjectsController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/delete/{project:id}', [ProjectsController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/image/{project:id}', [ProjectsController::class, 'imageForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/image/{project:id}', [ProjectsController::class, 'image'])->where('project', '[0-9]+')->middleware('auth');

Route::get('/console/users/list', [UsersController::class, 'list'])->middleware('auth');
Route::get('/console/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/console/users/add', [UsersController::class, 'add'])->middleware('auth');
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

Route::get('/console/skills/list', [SkillsController::class, 'list'])->middleware('auth');
Route::get('/console/skills/add', [SkillsController::class, 'addForm'])->middleware('auth');
Route::post('/console/skills/add', [SkillsController::class, 'add'])->middleware('auth');
Route::get('/console/skills/edit/{skill:id}', [SkillsController::class, 'editForm'])->where('skill', '[0-9]+')->middleware('auth');
Route::post('/console/skills/edit/{skill:id}', [SkillsController::class, 'edit'])->where('skill', '[0-9]+')->middleware('auth');
Route::get('/console/skills/delete/{skill:id}', [SkillsController::class, 'delete'])->where('skill', '[0-9]+')->middleware('auth');
Route::get('/console/skills/image/{skill:id}', [SkillsController::class, 'imageForm'])->where('skill', '[0-9]+')->middleware('auth');
Route::post('/console/skills/image/{skill:id}', [SkillsController::class, 'image'])->where('skill', '[0-9]+')->middleware('auth');

Route::get('/console/qualifications/list', [QualificationsController::class, 'list'])->middleware('auth');
Route::get('/console/qualifications/add', [QualificationsController::class, 'addForm'])->middleware('auth');
Route::post('/console/qualifications/add', [QualificationsController::class, 'add'])->middleware('auth');
Route::get('/console/qualifications/edit/{qualification:id}', [QualificationsController::class, 'editForm'])->where('type', '[0-9]+')->middleware('auth');
Route::post('/console/qualifications/edit/{qualification:id}', [QualificationsController::class, 'edit'])->where('type', '[0-9]+')->middleware('auth');
Route::get('/console/qualifications/delete/{qualification:id}', [QualificationsController::class, 'delete'])->where('type', '[0-9]+')->middleware('auth');

Route::get('/console/experiences/list', [ExperiencesController::class, 'list'])->middleware('auth');
Route::get('/console/experiences/add', [ExperiencesController::class, 'addForm'])->middleware('auth');
Route::post('/console/experiences/add', [ExperiencesController::class, 'add'])->middleware('auth');
Route::get('/console/experiences/edit/{experience:id}', [ExperiencesController::class, 'editForm'])->where('type', '[0-9]+')->middleware('auth');
Route::post('/console/experiences/edit/{experience:id}', [ExperiencesController::class, 'edit'])->where('type', '[0-9]+')->middleware('auth');
Route::get('/console/experiences/delete/{experience:id}', [ExperiencesController::class, 'delete'])->where('type', '[0-9]+')->middleware('auth');

Route::get('/console/blogs/list', [BlogsController::class, 'list'])->middleware('auth');
Route::get('/console/blogs/add', [BlogsController::class, 'addForm'])->middleware('auth');
Route::post('/console/blogs/add', [BlogsController::class, 'add'])->middleware('auth');
Route::get('/console/blogs/edit/{blog:id}', [BlogsController::class, 'editForm'])->where('blog', '[0-9]+')->middleware('auth');
Route::post('/console/blogs/edit/{blog:id}', [BlogsController::class, 'edit'])->where('blog', '[0-9]+')->middleware('auth');
Route::get('/console/blogs/delete/{blog:id}', [BlogsController::class, 'delete'])->where('blog', '[0-9]+')->middleware('auth');
Route::get('/console/blogs/image/{blog:id}', [BlogsController::class, 'imageForm'])->where('blog', '[0-9]+')->middleware('auth');
Route::post('/console/blogs/image/{blog:id}', [BlogsController::class, 'image'])->where('blog', '[0-9]+')->middleware('auth');