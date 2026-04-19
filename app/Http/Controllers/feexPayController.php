<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Feexpay\FeexpayPhp\FeexpayClass;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Wallets;
use App\Models\Paiements;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;




class feexPayController extends Controller
{


    /**
     * @OA\Post(
     *     path="/api/feexPay/transaction",
     *     summary="Create a transaction",
     *     tags={"feexPay"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="montant", type="string", example="100"),
     *             @OA\Property(property="phone_number", type="string", example="1234567890"),
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", example="johndoe@gmail.com"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *
     *         ),
     *     ),
     * )
     */

    public function createTransaction($fullname, $amount, $phone_number, $email)
    {
        set_time_limit(120);

        $apiKey = 'fp_IlZPzEu24zUggD3X2fJJPqXVlNDQXJ7xfDlu0xYOoIzs8RGQt4yv3x7WiADpvwZS';
        $idKey = '64a68ad128a550694980e2ee';

        $skeleton = new FeexpayClass($idKey,  $apiKey, "https://1c43-41-138-89-250.ngrok-free.app/api/handlePaymentCallback", "mode (LIVE)");
        $response = $skeleton->paiementLocal($amount, $phone_number, "network (MTN, MOOV)", $fullname, $email);
        sleep(40);
        $status = $skeleton->getPaiementStatus($response);

        $statuss = $status['status'];

        if ($statuss === 'SUCCESSFUL') {

            return $statuss;
        } else {
            return response()->json([
                'sucess' => false,
                'message' => 'transaction échouée',

            ], 400);
        }
    }




    /* public function handlePaymentCallback(Request $request)
{
    $paymentData = $request->all();
    Log::info('FeexPay Payment Callback:', $paymentData);
    if ($paymentData['status'] === 'SUCCESSFUL') {
        if (Auth::guard('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
            $user->verify_profil = 1;
            $user->save();

            return response()->json([
                'message' => 'Mise à jour de verify_profil effectuée avec succès.'
            ], 200);
        }
     } else {
        return response()->json([
        'message' => 'Échec de la mise à jour de verify_profil.'
    ], 500);}
}
 */



    /* public function buyKiss(Request $request)
{

    if (Auth::guard('sanctum')->check()) {
    $user = Auth::guard('sanctum')->user();


    $price=2;

    $id = $user->id;
    $phone_number=str_replace("+", "",$user->phone_number);
    $fullname = $user->name ." ".$user->prenom;
    $email=$user->email;

    $amount=$request->amount ;
    $nombreKiss =floor( $request->amount/$price);

    $response = $this->createTransaction($fullname, $amount, $phone_number, $email);

    if ($response === 'SUCCESSFUL') {

        $userWallets = Wallets::where('user_id', $user->id)->first();
        if (!$userWallets) {
            $userWallets = new Wallets();
            $userWallets->user_id = $user->id;
        }

        $userWallets->nombreKiss += $nombreKiss;
        $userWallets->validite = Carbon::now()->addYear();
        $userWallets->save();

        return response()->json([
            'message' => 'Achat de Kiss effectué avec succès.',
            'kiss_achetes' => $nombreKiss,
            'user_wallets' => $userWallets,
        ], 200);
    } else {
        return response()->json([
            'message' => 'Erreur lors de la transaction.',
        ], 500);
    }
} else {
             return response()->json(['message' => 'Utilisateur non authenthifié'], 401);

        }
} */



    // public function test()
    // {
    //     $skeleton = new Feexpay\FeexpayPhp\FeexpayClass("shop's id", "token key API", "callback_url", "mode (LIVE, SANDBOX)");
    //     $response = $skeleton->paiementLocal("amount", "phone_number", "network (MTN, MOOV)", "Jon Doe", "jondoe@gmail.com");
    //     $status = $skeleton->getPaiementStatus($response);
    //     var_dump($status);
    // }
}
