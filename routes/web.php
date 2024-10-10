<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VolunteerTaskController as ControllersVolunteerTaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VolunteerTaskController;
use App\Http\Controllers\Donor\DonorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('admin/volunteer-tasks', [VolunteerTaskController::class, 'index'])->name('admin.volunteer-tasks.index');
    Route::get('admin/volunteer-tasks/create', [VolunteerTaskController::class, 'create'])->name('admin.volunteer-tasks.create');
    Route::post('admin/volunteer-tasks', [VolunteerTaskController::class, 'store'])->name('admin.volunteer-tasks.store');
    Route::get('admin/volunteer-tasks/{volunteer_task}/edit', [VolunteerTaskController::class, 'edit'])->name('admin.volunteer-tasks.edit');
    Route::put('admin/volunteer-tasks/{volunteer_task}', [VolunteerTaskController::class, 'update'])->name('admin.volunteer-tasks.update');
    Route::delete('admin/volunteer-tTasks/{volunteer_task}', [VolunteerTaskController::class, 'destroy'])->name('admin.volunteer-tasks.destroy');
});

Route::middleware(['auth', 'role:donor'])->group(function () {
    Route::get('/donor/dashboard', function () {
        return view('donor.dashboard');
    })->name('donor.dashboard');
    Route::get('/donor/my-donations', [DonorController::class, 'myDonations'])->name('donor.my_donations');
    Route::get('/donor/donations/create', [DonorController::class, 'create'])->name('donor.donations.create');
    Route::post('/donor/donations', [DonorController::class, 'store'])->name('donor.donations.store');
    Route::get('/donor/donations/history', [DonorController::class, 'donationHistory'])->name('donor.donations.history');
});

Route::middleware(['auth', 'role:volunteer'])->group(function () {
    Route::get('/volunteer/dashboard', function () {
        return view('volunteer.dashboard');
    })->name('volunteer.dashboard');
    Route::get('volunteer/tasks/available', [ControllersVolunteerTaskController::class, 'availableTasks'])->name('volunteer.available_tasks');
    Route::post('volunteer/tasks/assign/{volunteerTask}', [ControllersVolunteerTaskController::class, 'assignTask'])->name('volunteer.assign_task');
    Route::get('volunteer/tasks/my-tasks', [ControllersVolunteerTaskController::class, 'myTasks'])->name('volunteer.my_tasks');
    Route::put('volunteer/tasks/complete/{volunteerTask}', [ControllersVolunteerTaskController::class, 'completeTask'])->name('volunteer.complete_task');
});

Route::middleware(['auth', 'role:recipient'])->group(function () {
    Route::get('/recipient/dashboard', function () {
        return view('recipient.dashboard');
    })->name('recipient.dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
