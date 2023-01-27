<?php

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
Auth::routes(['verify'=>true]);

//redirect back
Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'redirectBack'])->name('redirect.back');


//guest
Route::as('guest.')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
    Route::get('/department', [App\Http\Controllers\HomeController::class, 'department'])->name('department');
    Route::get('/register', [App\Http\Controllers\HomeController::class, 'register'])->name('register')->middleware('has-cookie');
    Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login')->middleware('has-cookie');
    Route::post('/login', [App\Http\Controllers\HomeController::class,'authenticate'])->name('authenticate');
    Route::post('/register', [App\Http\Controllers\HomeController::class,'validators'])->name('validator');
    Route::post('/create', [App\Http\Controllers\HomeController::class,'create'])->name('create');
    Route::get('/logout',  [App\Http\Controllers\HomeController::class,'logout'])->name('logout');
});

//student
Route::middleware(['auth','verified','prevent-back-history','user-access:student'])->prefix('student')->as('student.')->group(function(){
      //dashboard
    Route::controller(App\Http\Controllers\Student\Dashboard\DashboardController::class)->group(function(){
        Route::get('dashboard','index')->name('dashboard.index');
        Route::get('dashboard/print','print')->name('dashboard.print');
    });

    //schedule
    Route::controller(App\Http\Controllers\Student\Schedule\ScheduleController::class)->group(function(){
        Route::get('schedule','index')->name('schedule.index');
        Route::get('student/subject/{department?}/{year?}','subject')->name('schedule.subject');
        Route::get('student/subjectprint/{department?}/{year?}','subjectprint')->name('schedule.subjectprint');
        Route::get('student/grade/{department?}/{year?}','grade')->name('schedule.grade');
        Route::get('student/gradeprint/{department?}/{year?}','gradeprint')->name('schedule.gradeprint');
    });
       //setting
    Route::controller(App\Http\Controllers\Student\Setting\SettingController::class)->group(function(){
        Route::get('setting','index')->name('setting.index');
        Route::put('setting/{user}','update')->name('setting.update');
        Route::put('setting/password/{user}','password')->name('setting.password');
    });
});



// teacher

Route::middleware(['auth','verified','prevent-back-history','user-access:teacher'])->prefix('teacher')->as('teacher.')->group(function(){
    //dashboard
    Route::controller(App\Http\Controllers\Teacher\Dashboard\DashboardController::class)->group(function(){
        Route::get('dashboard','index')->name('dashboard.index');
        Route::get('dashboard/print','print')->name('dashboard.print');
    });

     //grade
     Route::controller(App\Http\Controllers\Teacher\Grade\GradeController::class)->group(function(){
        Route::get('grade','index')->name('grade.index');
        Route::get('grade/show/{schedule}','show')->name('grade.show');
        Route::put('grade/update','update')->name('grade.update');
    });

     //schedule
     Route::controller(App\Http\Controllers\Teacher\Schedule\ScheduleController::class)->group(function(){
        Route::get('schedule','index')->name('schedule.index');
        Route::get('schedule/show/{schedule}','show')->name('schedule.show');
        Route::get('schedule/ended/{teacher}','ended')->name('schedule.ended');
    });

    //setting
    Route::controller(App\Http\Controllers\Teacher\Setting\SettingController::class)->group(function(){
        Route::get('setting','index')->name('setting.index');
        Route::put('setting/{user}','update')->name('setting.update');
        Route::put('setting/password/{user}','password')->name('setting.password');
    });
});


// admin
Route::middleware(['auth','prevent-back-history','user-access:admin'])->prefix('admin')->as('admin.')->group(function(){
    //dashboard
    Route::controller(App\Http\Controllers\Admin\Dashboard\DashboardController::class)->group(function(){
        Route::get('dashboard','index')->name('dashboard.index');
    });
     //grade
     Route::controller(App\Http\Controllers\Admin\Subject\SubjectController::class)->group(function(){
        Route::get('subject','index')->name('subject.index');
        Route::get('subject/add','add')->name('subject.add');
        Route::post('subject/create','create')->name('subject.create');
        Route::delete('subject/destroy/{subject}','destroy')->name('subject.destroy');
        Route::put('subject/update/{subject}','update')->name('subject.update');
        Route::get('subject/edit/{subject}','edit')->name('subject.edit');
    });
    //yearlevel
      Route::controller(App\Http\Controllers\Admin\Yearlevel\YearlevelController::class)->group(function(){
        Route::get('yearlevel','index')->name('yearlevel.index');
        Route::get('yearlevel/add','add')->name('yearlevel.add');
        Route::post('yearlevel/create','create')->name('yearlevel.create');
        Route::delete('yearlevel/destroy/{yearlevel}','destroy')->name('yearlevel.destroy');
        Route::put('yearlevel/update/{yearlevel}','update')->name('yearlevel.update');
        Route::get('yearlevel/edit/{yearlevel}','edit')->name('yearlevel.edit');
    });

     //section
     Route::controller(App\Http\Controllers\Admin\Section\SectionController::class)->group(function(){
        Route::get('section','index')->name('section.index');
        Route::get('section/add','add')->name('section.add');
        Route::post('section/create','create')->name('section.create');
        Route::delete('section/destroy/{section}','destroy')->name('section.destroy');
        Route::put('section/update/{section}','update')->name('section.update');
        Route::get('section/edit/{section}','edit')->name('section.edit');
    });
    //department
    Route::controller(App\Http\Controllers\Admin\Department\DepartmentController::class)->group(function(){
        Route::get('department','index')->name('department.index');
        Route::get('department/add','add')->name('department.add');
        Route::post('department/create','create')->name('department.create');
        Route::delete('department/destroy/{department}','destroy')->name('department.destroy');
        Route::put('department/update/{department}','update')->name('department.update');
        Route::get('department/edit/{department}','edit')->name('department.edit');
    });
    //schedule
    Route::controller(App\Http\Controllers\Admin\Schedule\ScheduleController::class)->group(function(){
        Route::get('schedule','index')->name('schedule.index');
        Route::get('schedule/add','add')->name('schedule.add');
        Route::post('schedule/create','create')->name('schedule.create');
        Route::delete('schedule/destroy/{schedule}','destroy')->name('schedule.destroy');
        Route::put('schedule/update/{schedule}','update')->name('schedule.update');
        Route::get('schedule/edit/{schedule}','edit')->name('schedule.edit');
    });
    //enrolles
    Route::controller(App\Http\Controllers\Admin\Enrolles\EnrollesController::class)->group(function(){
        Route::get('enrolles','index')->name('enrolles.index');
    });
    //teacherschedule
    Route::controller(App\Http\Controllers\Admin\Teacherschedule\TeacherScheduleController::class)->group(function(){
        Route::get('teacherschedule','index')->name('teacherschedule.index');
        Route::get('teacherschedule/add','add')->name('teacherschedule.add');
        Route::post('teacherschedule/create','create')->name('teacherschedule.create');
        Route::delete('teacherschedule/destroy/{teacherschedule}','destroy')->name('teacherschedule.destroy');
        Route::put('teacherschedule/update/{teacherschedule}','update')->name('teacherschedule.update');
        Route::get('teacherschedule/edit/{teacherschedule}','edit')->name('teacherschedule.edit');
        Route::get('teacherschedule/show/{teacherschedule}','show')->name('teacherschedule.show');
        Route::get('teacherschedule/grade/{teacherschedule}','grade')->name('teacherschedule.grade');
    });
    //studentschedule
    Route::controller(App\Http\Controllers\Admin\Teacherschedule\StudentScheduleController::class)->group(function(){
        Route::post('studentschedule/create','create')->name('studentschedule.create');
        Route::delete('studentschedule/destroy/{studentschedule}','destroy')->name('studentschedule.destroy');
    });
    //studentgrade

    Route::controller(App\Http\Controllers\Admin\Teacherschedule\GradeController::class)->group(function(){
        Route::put('studentgrade/update','update')->name('studentgrade.update');
        Route::delete('studentgrade/destroy/{studentgrade}','destroy')->name('studentgrade.destroy');
    });
     //student
     Route::controller(App\Http\Controllers\Admin\Student\StudentController::class)->group(function(){
        Route::get('student','index')->name('student.index');
        Route::get('student/verify','verify')->name('student.verify');
        Route::get('student/verifyemail/{student}','verifyemail')->name('student.verifyemail');
        Route::get('student/hasfile','hasfile')->name('student.hasfile');
        Route::get('student/hasnofile','hasnofile')->name('student.hasnofile');
        Route::get('student/dropped','dropped')->name('student.dropped');
        Route::get('student/add','add')->name('student.add');
        Route::post('student/create','create')->name('student.create');
        Route::get('student/edit/{student}','edit')->name('student.edit');
        Route::get('student/destroy/{student}','destroy')->name('student.destroy');
        Route::put('student/update/{student}','update')->name('student.update');
        Route::get('student/detail/{student}','detail')->name('student.detail');
        Route::get('student/schedule/{student}','schedule')->name('student.schedule');
        Route::get('student/schedule/subject/{student?}/{department?}/{year?}','subject')->name('student.subject');
        Route::get('student/schedule/subjectprint/{student?}/{department?}/{year?}','subjectprint')->name('student.subjectprint');
        Route::get('student/schedule/grade/{student?}/{department?}/{year?}','grade')->name('student.grade');
        Route::get('student/schedule/gradeprint/{student?}/{department?}/{year?}','gradeprint')->name('student.gradeprint');
    });
    //student file
    Route::controller(App\Http\Controllers\Admin\Student\StudentFileController::class)->group(function(){
        Route::get('file/{student}','index')->name('student.file');
        Route::post('file/create/{student}','create')->name('student.file.create');
        Route::delete('file/destroy/{file}','destroy')->name('student.file.destroy');
        Route::get('file/show/{student}/{file}','show')->name('student.file.show');
    });

    Route::controller(App\Http\Controllers\Admin\Student\AcademicController::class)->group(function(){
        Route::get('student/show/{student}','show')->name('student.academic.show');
        Route::delete('student/destroy/{academic}','destroy')->name('student.academic.destroy');
        Route::post('student/store','create')->name('student.academic.create');
        Route::put('student/academic/update/{student?}/{academic?}','update')->name('student.academic.update');
    });

     //teacher
     Route::controller(App\Http\Controllers\Admin\Teacher\TeacherController::class)->group(function(){
        Route::get('teacher','index')->name('teacher.index');
        Route::get('teacher/add','add')->name('teacher.add');
        Route::post('teacher/create','create')->name('teacher.create');
        Route::get('teacher/edit/{teacher}','edit')->name('teacher.edit');
        Route::get('teacher/destroy/{teacher}','destroy')->name('teacher.destroy');
        Route::put('teacher/update/{teacher}','update')->name('teacher.update');
        Route::get('teacher/detail/{teacher}','detail')->name('teacher.detail');
        Route::get('teacher/schedule/{teacher}','schedule')->name('teacher.schedule');
        Route::get('teacher/ended/{teacher}','ended')->name('teacher.ended');
    });

    //setting
    Route::controller(App\Http\Controllers\Admin\Setting\SettingController::class)->group(function(){
        Route::get('setting','index')->name('setting.index');
        Route::put('setting/{user}','update')->name('setting.update');
        Route::put('setting/password/{user}','password')->name('setting.password');
    });
});



