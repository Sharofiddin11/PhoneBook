<?php

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
use App\people;
use App\department;
use App\otdel;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    $deperdatas = department::latest()->paginate(5);
    $otdeldates = otdel::latest()->paginate(5);
    return view('welcome', compact('deperdatas'), compact('otdeldates'));
});

Auth::routes();
Route::group(['middleware' => 'auth'], function()
{

	Route::resource('people','peopleCon');
	route::resource('otdel','otdelCon');
    route::resource('deper','deperCon');

    Route::group(['middleware' => 'extended'], function()
    {
    });


});
Route::get('/home', 'HomeController@index')->name('home');


Route::any ( '/search', function () {

    $deperdatas = department::latest()->paginate(5);
    $otdeldates = otdel::latest()->paginate(5);

    $q = Request::get ( 'q' );
    $st = Request::get( 'ST' );
    $st1 = Request::get( 'ST1' );

    if($st != 'Chose department' && $st1 != 'Chose otdel') {
    	$user = people::where ( 'Dep_name', 'LIKE', '%' . $st . '%' )->where ( 'otd_name', 'LIKE', '%' . $st1 . '%' )->where ( 'name', 'LIKE', '%' . $q . '%' )->get ();
	    if (count ( $user ) > 0)
	        return view ( 'welcome', compact('deperdatas', 'otdeldates'))->with('details', $user )->withQuery ( $st );
	    else
	        return view ( 'welcome', compact('deperdatas', 'otdeldates') )->withMessage ( 'No Details found. Try to search again !' );
    }

    if($st1 != 'Chose otdel') {
    	$user = people::where ( 'otd_name', 'LIKE', '%' . $st1 . '%' )->where ( 'name', 'LIKE', '%' . $q . '%' )->get ();
	    if (count ( $user ) > 0)
	        return view ( 'welcome', compact('deperdatas', 'otdeldates'))->with('details', $user )->withQuery ( $st );
	    else
	        return view ( 'welcome', compact('deperdatas', 'otdeldates') )->withMessage ( 'No Details found. Try to search again !' );
    }

    if($st == 'Chose department') {
	    $user = people::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->orWhere ( 'address', 'LIKE', '%' . $q . '%' )->get ();
	    if (count ( $user ) > 0)
	        return view ( 'welcome', compact('deperdatas', 'otdeldates') )->with('details', $user )->withQuery ( $st );
	    else
	        return view ( 'welcome', compact('deperdatas', 'otdeldates') )->withMessage ( 'No Details found. Try to search again !' );
    } else {
        $user = people::where ( 'Dep_name', 'LIKE', '%' . $st . '%' )->where ( 'name', 'LIKE', '%' . $q . '%' )->get ();
	    if (count ( $user ) > 0)
	        return view ( 'welcome', compact('deperdatas', 'otdeldates') )->with('details', $user )->withQuery ( $st );
	    else
	        return view ( 'welcome', compact('deperdatas', 'otdeldates') )->withMessage ( 'No Details found. Try to search again !' );
    }
} );
/*
Route::any ( '/search_deper', function () {
    $q = Request::get ( 'q' );
    $user = people::where ( 'Dep_name', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $user ) > 0)
        return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::any ( '/search_otdel', function () {
    $q = Request::get ( 'q' );
    $user = people::where ( 'otd_name', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $user ) > 0)
        return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
} );
 */