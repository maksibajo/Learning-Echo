<?php


use App\Events\TaskCreated;
use App\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    return Task::latest()->pluck('body');
});

Route::post('/tasks', function () {
    $task = Task::forceCreate(request(['body']));

    event(new TaskCreated($task));
});