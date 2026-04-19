<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\PushDemo;
#use Auth;
use App\Models\PushSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PushController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function updatePushSubscription($endpoint, $key, $token, $contentEncoding)
    {
        $pushSubscription = new PushSubscription();
        $pushSubscription->endpoint = $endpoint;
        $pushSubscription->public_key = $key;
        $pushSubscription->auth_token = $token;
        $pushSubscription->content_encoding = $contentEncoding; // Inclure le paramètre 'content_encoding'

        // Enregistrez ou associez le pushSubscription à l'utilisateur selon vos besoins
        $this->pushSubscriptions()->save($pushSubscription);
    }

    /**
     * Store the PushSubscription.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
        ]);
        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $user = Auth::user();
        $contentEncoding = 'aes128gcm';
        $user->updatePushSubscription($endpoint, $key, $token, $contentEncoding);

        return response()->json(['success' => true], 200);
    }



    /**
     * Send Push Notifications to all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function push()
    {
        $users = User::all();
        foreach ($users as $user) {
            $notification = new PushDemo;

            $result = Notification::send($user, $notification);

            if ($result === null) {
                // La notification n'a pas pu être envoyée à l'utilisateur $user
                // Effectuez les actions appropriées ici

            } else {
                // La notification a été envoyée avec succès à l'utilisateur $user
                // Effectuez les actions appropriées ici
                dd($result);
            }
        }

        return redirect()->back();
    }
}
