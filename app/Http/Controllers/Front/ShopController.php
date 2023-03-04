<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopLog;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    /**
     * ShopController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('selected.character', ['only' => 'postPurchase', 'postGift']);
        $this->middleware('server.online', ['only' => 'postPurchase']);
    }

    public function getIndex()
    {
        $api = new API();
        return view('front.shops.index', [
            'items' => Shop::orderBy('created_at', 'desc')->paginate(config('pw-config.shop.page')),
            'friends' => $api->getRoleFriends(Auth::user()->characterId()),
        ]);
    }

    public function getMask($mask)
    {
        $api = new API();
        return view('front.shops.index', [
            'items' => Shop::where('mask', $mask)->paginate(config('pw-config.shop.page')),
            'friends' => $api->getRoleFriends(Auth::user()->characterId()),
        ]);
    }

    public function postPurchase(Shop $shop): RedirectResponse
    {
        $user = Auth::user();
        $item = $shop;
        $item_price = ($item->discount > 0) ? $item->price - ($item->price / 100 * $item->discount) : $item->price;

        if ($user->money >= $item_price) {
            $api = new API();
            $mail = array(
                'title' => __('shop.mail_item.title', ['name' => config('app.name')]),
                'message' => __('shop.mail_item.message', ['name' => $item->name, 'count' => $item->count, 'staff' => config('app.name')]),
                'money' => 0,
                'item' => array(
                    'id' => $item->item_id,
                    'pos' => 0,
                    'count' => $item->count,
                    'max_count' => $item->max_count,
                    'data' => $item->octet,
                    'proctype' => $item->protection_type,
                    'expire_date' => $item->expire_date,
                    'guid1' => 0,
                    'guid2' => 0,
                    'mask' => $item->mask,
                ),
            );
            $api->sendMail(Auth::user()->characterId(), $mail['title'], $mail['message'], $mail['item'], $mail['money']);
            $user->money -= $item_price;
            $user->save();

            $item->times_bought += 1;
            $item->save();

            ShopLog::create([
                'userid' => $user->ID,
                'item_name' => $item->name,
                'item_id' => $item->item_id,
                'price' => $item_price
            ]);

            $status = 'success';
            $message = __('shop.purchase_complete', ['name' => $item->name]);
        } else {
            $status = 'error';
            $message = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }
        return redirect()->back()->with($status, $message);
    }

    public function postGift(Request $request, Shop $shop): RedirectResponse
    {
        $this->validate($request, [
            'friends' => 'required|array|min:1'
        ]);
        $user = Auth::user();
        $item = $shop;
        $item_price = ($item->discount > 0) ? ($item->price - ($item->price / 100 * $item->discount)) : $item->price;
        $status = '';
        $message = '';

        if ($user->money > $item_price) {
            $api = new API();
            $mail = array(
                'title' => __('shop.gift_item.title'),
                'message' => __('shop.gift_item.message', ['name' => $item->name, 'count' => $item->count, 'player' => $user->characterName()]),
                'money' => 0,
                'item' => array(
                    'id' => $item->item_id,
                    'pos' => 0,
                    'count' => $item->count,
                    'max_count' => $item->max_count,
                    'data' => $item->octet,
                    'proctype' => $item->protection_type,
                    'expire_date' => $item->expire_date,
                    'guid1' => 0,
                    'guid2' => 0,
                    'mask' => $item->mask,
                ),
            );
            foreach ($request->friends as $friend) {
                if ($api->sendMail($friend, $mail['title'], $mail['message'], $mail['item'], $mail['money'])) {
                    $user->money -= $item_price;
                    $user->save();

                    $item->times_bought += 1;
                    $item->save();

                    ShopLog::create([
                        'userid' => $user->ID,
                        'item_name' => $item->name,
                        'item_id' => $item->item_id,
                        'price' => $item->price
                    ]);

                    $status = 'success';
                    $message = __('shop.gift_complete', ['name' => $item->name, 'count' => count($request->friends)]);
                } else {
                    $status = 'error';
                    $message = __('general.serverOffline');
                }
            }
        } else {
            $status = 'error';
            $message = __('general.not_enough', ['currency' => config('pw-config.currency_name')]);
        }
        return redirect()->back()->with($status, $message);
    }

    public function postPoint(Shop $shop): RedirectResponse
    {
        $user = Auth::user();
        $item = $shop;
        $item_price = $item->poin;

        if ($user->bonuses >= $item_price) {
            $api = new API();
            $mail = array(
                'title' => __('shop.mail_item.title', ['name' => config('app.name')]),
                'message' => __('shop.mail_item.message', ['name' => $item->name, 'count' => $item->count, 'staff' => config('app.name')]),
                'money' => 0,
                'item' => array(
                    'id' => $item->item_id,
                    'pos' => 0,
                    'count' => $item->count,
                    'max_count' => $item->max_count,
                    'data' => $item->octet,
                    'proctype' => $item->protection_type,
                    'expire_date' => $item->expire_date,
                    'guid1' => 0,
                    'guid2' => 0,
                    'mask' => $item->mask,
                ),
            );
            $api->sendMail(Auth::user()->characterId(), $mail['title'], $mail['message'], $mail['item'], $mail['money']);
            $user->bonuses -= $item_price;
            $user->save();

            $item->times_bought += 1;
            $item->save();

            ShopLog::create([
                'userid' => $user->ID,
                'item_name' => $item->name,
                'item_id' => $item->item_id,
                'poin' => $item_price
            ]);

            $status = 'success';
            $message = __('shop.purchase_complete', ['name' => $item->name]);
        } else {
            $status = 'error';
            $message = __('general.not_enough', ['currency' => __('vote.create.type_bonusess')]);
        }
        return redirect()->back()->with($status, $message);
    }
}
