<?php

namespace App\Http\Controllers;

use Devinweb\LaravelHyperpay\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class TestController extends Controller
{
    function request()
    {
        $id = Str::random('64');
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8ac7a4c7821355f801821558fc2c1b00" .
            "&amount=59" .
            "&currency=SAR" .
            "&paymentType=DB" .
            "&testMode=INTERNAL" .
            "&merchantTransactionId=" . $id .
            "&customer.email=moeezahmed448@gmail.com" .
            "&billing.street1=chaghiroadquetta" .
            "&billing.city=quetta" .
            "&billing.state=balochistan" .
            "&billing.country=AE" .
            "&billing.postcode=87300" .
            "&customer.givenName=Hamza" .
            "&customer.surname=khan";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjN2E0Yzc4MjEzNTVmODAxODIxNTU4OTJiMTFhZmJ8ZWJaV3NacDNFRw=='
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
        $data = json_decode($responseData);
        // return $data;
        return view('dashboard', compact('data'));
    }

    function xyz()
    {
        $url = "https://eu-test.oppwa.com/scheduling/v1/schedules";
        $data = "entityId=8ac7a4c981faa8650181fe74372c0553" .
            "&registrationId=8ac7a4a08232401e0182350b2c776a0c" .
            "&amount=17.00" .
            "&currency=EUR" .
            "&paymentType=DB" .
            "&job.month=*" .
            "&job.dayOfMonth=1";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjN2E0Yzk4MWZhYTg2NTAxODFmZTc0MzcyYjA1NTJ8Z1p4cktBN2hoNg=='
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
        $datatyp = json_decode($responseData);
        return $datatyp;
        return view('dashboard', compact('datatyp'));
    }


    // public function xyz()
    // {
    //     $url = "https://eu-test.oppwa.com/scheduling/v1/schedules";
    //     $data = "entityId=8ac7a4c981faa8650181fe74372c0553" .
    //         "&registrationId={registrationId}" .
    //         "&amount=17.00" .
    //         "&currency=EUR" .
    //         "&paymentType=DB" .
    //         "&job.month=*" .
    //         "&job.dayOfMonth=1";

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Authorization:Bearer OGFjN2E0Yzk4MWZhYTg2NTAxODFmZTc0MzcyYjA1NTJ8Z1p4cktBN2hoNg=='
    //     ));
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $responseData = curl_exec($ch);
    //     if (curl_errno($ch)) {
    //         return curl_error($ch);
    //     }
    //     curl_close($ch);
    //     // return $responseData;
    //     $datatyp = json_decode($responseData);
    //     return $datatyp;
    // }
}
