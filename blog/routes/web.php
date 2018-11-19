<?php

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request as Request;
use App\Tag;

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

Route::get('/', [
    'uses'=>'PostController@getIndex',
    'as'=>'index'
]);

Route::get('post/{id}',[
    'uses'=>'PostController@getPost',
    'as'=>'post'
]);

Route::get('post/{id}/like',[
    'uses'=>'PostController@addPostLike',
    'as'=>'post_like'
]);

Route::get('about', function () {
    return view('other.about');
})->name('about');


////////////////////////////////////////////// admin routes
Route::group(['prefix'=>'admin'],function(){

    Route::get('',[
        'uses'=> 'PostController@getAdminIndex',
        'as'=> 'admin'
    ]);

    Route::get('create', function () {return view('admin.create',['tags'=>Tag::all()]);})->name('create_admin');  

    Route::post('create',[
        'uses'=> 'PostController@addPost',
        'as'=> 'create_admin'
    ]); 

    Route::get('edit/{id}',[
        'uses'=> 'PostController@viewPost',
        'as'=> 'edit_admin'
    ]);  

    Route::post('edit',[
        'uses'=>'PostController@editPost',
        'as'=>'update_admin'
    ]);

    Route::get('delete/{id}',[
        'uses'=>'PostController@deletePost',
        'as'=>'delete_admin'
    ]);

    Route::get('delete',[
        'uses'=>'PostController@deleteAll',
        'as'=>'delete_all_posts'
    ]);
});

Auth::routes();
//Overwrite route
Route::post('/login',[
    'uses'=>'SignInController@signIn',
    'as'=>'login'
]); //this route overwrite other route in Auth::routes()
