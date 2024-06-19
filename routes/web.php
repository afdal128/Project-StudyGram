<?php

use Illuminate\Support\Facades\Route;
use App\Models\tugas;
use App\Http\Controllers\getTask;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

Route::get('/', [getTask::class, 'showTasks'])->name('home')-> middleware('auth');
Route::match(['get', 'post'],'/show-tasks', [getTask::class, 'showTasks'])->name('showTasks')-> middleware('auth');
Route::match(['get', 'post'],'/task-detail', [getTask::class, 'showTaskDetail'])-> middleware('auth');
Route::post('/add-task', [getTask::class, 'addTask']);
Route::get('/activity', [getTask::class, 'showNotifications'])->name('aktivitas')-> middleware('auth') ;
Route::get('/notifications', [getTask::class, 'showNotifications'])-> middleware('auth');
Route::post('/edit-task', [getTask::class, 'editTask'])->name('editTask');
Route::get('/task/{taskId}/delete', [getTask::class, 'deleteTask'])->name('deleteTask');
route::get('/register', [RegisterController:: class, 'daftar'])-> middleware('guest');
route::post('/register', [RegisterController:: class, 'store']);
Route::get('/login', [LoginController:: class, 'form'])->name('login')-> middleware('guest'); 
Route::post('/login', [LoginController:: class, 'authen']);    
Route::post('/logout', [LoginController:: class, 'logout']);   

