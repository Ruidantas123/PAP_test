<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/', function () {
    //return view('welcome');

    //show all users
    //$users = DB::select("select * from users");
    //$users = DB::table('users')->where('id',1)->first();
    //$user = User::where('id',1)->first();
    $users = User::all();

    //get the first user
    // $users = DB::table('users')->first();

    //find the user by id
    // $users = DB::table('users')->find(1);

    $user = User::all();

    //insert users
    // $user = DB::table('users')->insert([

    //     'name'      =>'asdasdasda',
    //     'email'     =>'dantas@gmail.com',
    //     'password'  =>'asdasdasd',
    // ]);

    //create users
    //$user = User::create([

    //     'name'      =>'asdasdasda',
    //     'email'     =>'dantas4@gmail.com',
    //     'password'  =>bcrypt('password'),
    //]);

    //delete users by the id
    //$user = DB::table('users')->where('id', 2)->delete();

    //update users by the id
    //$user = DB::table('users')->where('id', 1)->update(['email' =>  'dantas2@gmail.com']);

    //$user = User::find(1);
    //$user->update([
    //    'email' => 'dantas2@gmail.com',
    //]);

    //$user = User::find(1);
    //$user->delete();

    dd($user);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
