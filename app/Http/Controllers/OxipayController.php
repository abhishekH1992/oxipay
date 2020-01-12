<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OxipayController extends Controller
{
	//Genrate a oxipay signature
    function oxipay_sign($query, $api_key){
        $clear_text = '';
        ksort($query);
        foreach ($query as $key => $value) {
            if (substr($key, 0, 2) === "x_" && $key !=="x_signature") {
                $clear_text .= $key . $value;
            }
        }
        $hash = hash_hmac( "sha256", $clear_text, $api_key);
        return str_replace('-', '', $hash);
    }

    public function payment(Request $request){
        //Genearete a unique reference number
        $ref = mt_rand(10000, 99999);

        //SET YOUR OXIPAY ACCOUNT DETAILS AND PAYMENT SETTINGS
        $oxi = ['x_account_id'=>env('ACCOUNT_ID'),'x_amount'=>env('AMOUNT'),'x_currency'=>env('CURRENCY'),'x_reference'=> $ref,'x_shop_country'=>env('COUNTRY_CODE'),'x_shop_name'=>env('SHOP_NAME'),'x_url_callback'=>env('CALLBACK_URL'),'x_url_complete'=>env('COMPLETE_URL'),'x_url_cancel'=>env('CANCEL_URL'),'x_test'=>env('TEST')];
        
        $signature = $this->oxipay_sign($oxi, env('OXIPAY_API_KEY'));

        return view('oxipay', compact('signature', 'ref'));
    }
}
