<?php





/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], static function () {
    Route::get('paymentwall', [
        'as' => 'api.paymentwall',
        'middleware' => 'paymentwall.pingback',
        'uses' => 'App\Http\Controllers\Pingback@paymentwall'
    ]);

    Route::post(config('ipaymu.route'), [
        'as' => 'api.ipaymu',
        'middleware' => 'ipaymu.active',
        'uses' => 'App\Http\Controllers\Pingback@IpaymuCallback'
    ]);

    Route::post('arenatop100', [
        'as' => 'api.arenatop100',
        'middleware' => 'arena.active',
        'uses' => 'App\Http\Controllers\ArenaCallback@incentive'
    ]);
});
