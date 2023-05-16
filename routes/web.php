<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\SchoolsController;
use App\Http\Controllers\Admins\SiteSettingController;
use App\Http\Controllers\Schools\StudentController;
use App\Http\Controllers\Schools\TransactionController;
use App\Http\Controllers\Schools\SchoolUsersController;

use App\Http\Controllers\ParentController;

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
    return view('auth.login');
});


Route::group(['middleware' => 'prevent-back-history'],function(){

    




    Route::middleware(['auth'])->group(function(){

Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});


// Admin all Routes
Route::get('/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/profile',[AdminController::class,'profileAdmin'])->name('profile.view');

Route::post('/profile/update',[AdminController::class,'profileUpdate'])->name('admin.profile.update');
Route::post('/password/update',[AdminController::class,'passUpdate'])->name('admin.password.update');



Route::get('/view/admin/users', [AdminController::class, 'ViewAdminUsers'])->name('view.admin.user');
Route::get('/add/admin/user', [AdminController::class, 'AddAdminUser'])->name('add.admin.user');

Route::post('/store/admin/user', [AdminController::class, 'StoreAdminUser'])->name('admin.user.store');

Route::get('/admin/user/edit/{id}', [AdminController::class, 'EditAdminUser'])->name('edit.admin.user');
Route::post('/admin/user/update/{id}', [AdminController::class, 'UpdateAdminUser'])->name('admin.user.update');

Route::get('/admin/user/delete/{id}', [AdminController::class, 'DeleteAdminUser'])->name('delete.admin.user');


Route::get('/admin/user/inactive/{id}',[AdminController::class,'inactiveAdminUser'])->name('admin.user.inactive');

Route::get('/admin/user/active/{id}',[AdminController::class,'activeAdminUser'])->name('admin.user.active');







//Schools Routes
Route::get('/view/schools', [SchoolsController::class, 'ViewSchools'])->name('view.schools');
Route::get('/add/school', [SchoolsController::class, 'AddSchools'])->name('add.school');

Route::post('/store/school', [SchoolsController::class, 'StoreSchools'])->name('school.store');

Route::get('/school/edit/{id}', [SchoolsController::class, 'EditSchools'])->name('edit.school');
Route::post('/school/update/{id}', [SchoolsController::class, 'UpdateSchools'])->name('school.update');

Route::get('/school/delete/{id}', [SchoolsController::class, 'DeleteSchools'])->name('delete.school');


Route::get('/school/inactive/{id}',[SchoolsController::class,'inactiveSchools'])->name('school.inactive');

Route::get('/school/active/{id}',[SchoolsController::class,'activeSchools'])->name('school.active');



// All Students Informations
Route::get('/view/all/students', [SchoolsController::class, 'ViewSchoolStudents'])->name('view.all.students');



// All Students Transactions Informations
Route::get('/view/all/deposits', [SchoolsController::class, 'ViewSchoolTransactions'])->name('view.all.deposits');



// All Students Transactions Informations
Route::get('/view/api/questions', [SchoolsController::class, 'ViewQuestions'])->name('view.api.questions');



// All Apis Transfers Informations
Route::get('/view/api/tranfers}', [SchoolsController::class, 'ViewTranfsers'])->name('view.all.transfers');


    

}); // End Middleare  Admin Auth Route





Route::group(['prefix' => 'school','middleware' =>['school:school']],function(){

    Route::get('/login', [SchoolUsersController::class,'SchoolloginForm']);
    Route::post('/login', [SchoolUsersController::class,'schoolstore'])->name('school.login');

}); 





Route::middleware(['auth:school'])->group(function(){


Route::middleware(['auth:sanctum,school','verified'])->group(function () {
    Route::get('/school/dashboard', function () {
        return view('schools.index');
    })->name('dashboard');
});

    


// School Users all Routes
Route::get('/school/logout',[SchoolUsersController::class,'destroy'])->name('school.logout');
Route::get('/school-user/profile',[SchoolUsersController::class,'SchoolUserprofile'])->name('school.user.profile.view');
//Route::post('/school/profile/update',[AdminController::class,'profileUpdate'])->name('admin.profile.update');
Route::post('/school/password/update',[SchoolUsersController::class,'schoolpassUpdate'])->name('school.password.update');




//Students Routes
Route::get('/view/students', [StudentController::class, 'ViewStudents'])->name('view.students');
Route::get('/add/students', [StudentController::class, 'AddStudents'])->name('add.students');

Route::post('/store/students', [StudentController::class, 'StoreStudents'])->name('students.store');

Route::get('/students/edit/{id}', [StudentController::class, 'EditStudents'])->name('edit.students');
Route::post('/students/update/{id}', [StudentController::class, 'UpdateStudents'])->name('students.update');

Route::get('/students/delete/{id}', [StudentController::class, 'DeleteStudents'])->name('delete.students');


Route::get('/students/inactive/{id}',[StudentController::class,'inactiveStudents'])->name('students.inactive');

Route::get('/students/active/{id}',[StudentController::class,'activeStudents'])->name('students.active');





// All Students Transactions Informations

Route::get('/view/students/accounts', [TransactionController::class, 'ViewStudentTransactions'])->name('view.students.transactions');



Route::get('/view/student/account/details/{acct_id}', [TransactionController::class, 'ViewStudentAccountDetails'])->name('view.student.account');



Route::get('/student/withdrawal/form/{id}', [TransactionController::class, 'StudentWithdrawalForm'])->name('student.withdrawal.form');



Route::get('/student/loan/form/{id}', [TransactionController::class, 'StudentLoanForm'])->name('student.loan.form');




///Withdrawal routes ///

Route::post('/student/withdrawal/store/{id}',[TransactionController::class, 'StudentWithdrawalAmountStore'])->name('student.withdrawal.amount.store');


Route::get('/student/withdrawal/delete/{id}',[TransactionController::class, 'StudentWithdrawalAmountDelete'])->name('student.withdrawal.amount.delete'); 



Route::get('/student/withdrawal/edit/{id}', [TransactionController::class, 'StudentWithdrawnEdit'])->name('withdrawal.update');


Route::post('/student/withdrawn/amount/update/{id}',[TransactionController::class, 'StudentWithdrawnAmountUpdate'])->name('student.withdrawal.amount.update');






///Loans routes ///

Route::post('student/loan/store/{id}',[TransactionController::class, 'StudentLoanAmountStore'])->name('student.loan.amount.store');


Route::get('/student/loan/edit/{id}', [TransactionController::class, 'StudentLoanEdit'])->name('loan.update');


Route::post('/student/loan/amount/update/{id}',[TransactionController::class, 'StudentLoanAmountUpdate'])->name('student.loan.amount.update');



Route::get('student/loan/delete/{id}',[TransactionController::class, 'StudentLoanAmountDelete'])->name('student.loan.amount.delete'); 

Route::get('loan/payment/update/{id}',[TransactionController::class, 'StudentLoanPaymentUpdate'])->name('loan.payment.update');


Route::post('loan/payment/amount/update/{id}',[TransactionController::class, 'StudentLoanPaymentAmountUpdate'])->name('loan.payment.amount.update');









    

}); // End Middleare  School Auth Route






Route::get('/student/account/view', [ParentController::class, 'StudentAccountView']);

Route::get('/student/account/get', [ParentController::class, 'StudentAccountGet'])->name('student.account.get');




Route::get('/transfer/pockek/cash/form', [SchoolsController::class, 'TransferPocketCashView']);

Route::get('/transfer/pockek/cash', [SchoolsController::class, 'TransferPocketCashGet']);





});  // Prevent Back Middleare


