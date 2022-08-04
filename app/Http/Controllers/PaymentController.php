<?php

namespace App\Http\Controllers;

use Devinweb\LaravelHyperpay\Facades\LaravelHyperpay;
use App\Billing\HyperPayBilling;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function welcome(Request $request)
    {
        $url = "https://eu-test.oppwa.com/v1/checkouts/" . $request->id . "/payment";
        $url .= "?entityId=8ac7a4c7821355f801821558fc2c1b00";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjN2E0Yzc4MjEzNTVmODAxODIxNTU4OTJiMTFhZmJ8ZWJaV3NacDNFRw=='
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);

        $data = json_decode($responseData);
        return $data;
        // return view('welcome');
    }


    // public function welcome($id)
    // {
    //     $url = "https://eu-test.oppwa.com/v1/payments/" . $id;
    //     $url .= "?entityId=8ac7a4c7821355f801821558fc2c1b00";

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Authorization:Bearer OGFjN2E0Yzc4MjEzNTVmODAxODIxNTU4OTJiMTFhZmJ8ZWJaV3NacDNFRw=='
    //     ));
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $responseData = curl_exec($ch);
    //     if (curl_errno($ch)) {
    //         return curl_error($ch);
    //     }
    //     curl_close($ch);
    //     return $responseData;
    // }


    public function prepareCheckout(Request $request)
    {
        $trackable = [
            'product_id' => 'bc842310-371f-49d1-b479-ad4b387f6630',
            'product_type' => 't-shirt'
        ];

        $id = Str::random('64');
        $user = User::first();
        $amount = 10;
        $brand = 'VISA'; // MASTER OR MADA

        return LaravelHyperpay::addMerchantTransactionId($id)->addBilling(new HyperPayBilling())->checkout($trackable, $user, $amount, $brand, $request);

        // return LaravelHyperpay::checkout($trackable_data, $user, $amount, $brand, $request);
    }

    public function ko()
    {
        return view('welcome');
    }


    public function request()
    {
        $url = "https://eu-test.oppwa.com/v1/payments";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=92.00" .
            "&currency=EUR" .
            "&paymentBrand=VISA" .
            "&paymentType=DB" .
            "&card.number=4200000000000000" .
            "&card.holder=Jane Jones" .
            "&card.expiryMonth=05" .
            "&card.expiryYear=2034" .
            "&card.cvv=123" .
            "&standingInstruction.mode=INITIAL" .
            "&standingInstruction.source=CIT" .
            "&createRegistration=true";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $xyz = json_decode($responseData);
        return $xyz;
    }
}
