<?php
use App\Models\Group;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomeRegistartionController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;


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
    $groups = Group::all();
    return view('landingpage',compact('groups'));
});

Route::get('login', [CustomeRegistartionController::class, 'index'])->name('login');
Route::post('custom-login', [CustomeRegistartionController::class, 'customLogin'])->name('login.custom');
Route::get('/registration',[CustomeRegistartionController::class, 'registration_index']);
Route::post('/registration/store',[CustomeRegistartionController::class, 'registration'])->name('registration.store');
Route::post('signout', [CustomeRegistartionController::class, 'signOut'])->name('signout');
// group rout start
Route::get('/group/create', [GroupController::class, 'group_create'])->name('group.create');
Route::post('/group/store', [GroupController::class, 'group'])->name('group.store');
Route::get('/group/show', [GroupController::class, 'group_show'])->name('group.show');
Route::get('/group/home', [GroupController::class, 'group_home'])->name('group.home');
Route::get('/join/group/{id}', [GroupController::class, 'join_group'])->name('join.group');
Route::get('/group/all/member/{id}', [GroupController::class, 'group_all_member'])->name('group.all.members');
Route::get('/group/member/approve', [GroupController::class, 'group_member_approve'])->name('group.member.approve');
Route::get('/group/study/topics/{group_id}', [GroupController::class, 'group_study_topics'])->name('group.study.topics');


// group rout end
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/profile/my_group', [ProfileController::class, 'mygroup'])->name('profile.group');
Route::get('/profile/exam/index', [ProfileController::class, 'myexam'])->name('profile.exam.index');
Route::get('/profile/exam/start', [ProfileController::class, 'exam_start'])->name('profile.exam.start');
Route::get('/profile/result/show', [ProfileController::class, 'result_show'])->name('profile.result.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



