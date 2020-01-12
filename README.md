# Oxipay payment gateway integration using Laravel
## Summary

- [About Oxipay](#about-oxipay)
- [Project Installation](#project-installation)
- [Configuration](#configuration)
- [References](#references)

## About Oxipay
Oxipay is a flexible payment solution in Australia and New Zealand. Oxipay allows their users to buy now and pay later option. You can integrate oxipay with various e-commerce solution like Shopify, WooCommerce, Magento, Presta Shop, OpenCart and Cube Cart using their plugins.

This code is for those who would like to integrate oxipay in their e-commerce platfom using **Laravel and PHP**. 

## Project Installation
For testing purpose.

- Download and install composer - [link](https://getcomposer.org/)
- Clone Project from github `git clone https://github.com/abhishekH1992/oxipay.git`
- Rename `bash .env.example` file to `.env`
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan serve`

## Configuration
1. In `.env`, change oxipay globle variable to your oxipay settings (Instead of creating global varibles you can use directly in controller and blade file. Check option 2)
```
ACCOUNT_ID = {{YOUR_OXIPAY_MERCHANT_ID}}
CURRENCY = {{CURRENCY_CODE}}
COUNTRY_CODE = {{COUNTRY_CODE}}
SHOP_NAME = {{YOUR_SHOP_NAME_REGISTERED_WITH_OXIPAY}}
CALLBACK_URL = {{CALLBACK_URL}}
COMPLETE_URL = {{COMPLETE_URL}}
CANCEL_URL = {{CANCEL_URL}}
TEST = {{SET_MODE_TRUE_FALSE}}
OXIPAY_API_KEY = {{SET_YOUR_OXIPAY_API_KEY}}
```
2. Instead of creating globale variables
In `oxipay.blade.php`
```
<input type="hidden" class="form-control" name="x_amount" value="YOUR_AMOUNT">
<input type="hidden" name="x_account_id" value="YOUR_MARCHANT_ID">
<input type="hidden" name="x_currency" value="YOUR_CURRENCY_CODE">
<input type="hidden" name="x_reference" value="{{$ref}}">
<input type="hidden" name="x_shop_country" value="COUNTRY_CODE">
<input type="hidden" name="x_shop_name" value="YOUR_SHOP_NAME">
<input type="hidden" name="x_signature" value="{{$signature}}">
<input type="hidden" name="x_url_callback" value="YOUR_CALLBACK_URL">
<input type="hidden" name="x_url_complete" value="YOUR_COMPLETE_URL">
<input type="hidden" name="x_url_cancel" value="YOUR_CANCEL_URL">
<input type="hidden" name="x_test" value="YOUR_TEST"># Set true if live. Set false if using sandbox
```
Now also in `OxipayController.php`
```
$oxi = ['x_account_id'=>'YOUR_MARCHANT_ID,'x_amount'=>'YOUR_AMOUNT','x_currency'=>'YOUR_CURRENCY_CODE',
'x_reference'=> $ref,'x_shop_country'=>'COUNTRY_CODE','x_shop_name'=>YOUR_SHOP_NAME',
'x_url_callback'=>'YOUR_CALLBACK_URL','x_url_complete'=>'YOUR_COMPLETE_URL','x_url_cancel'=>'YOUR_CANCEL_URL',
'x_test'=>'TEST];
```

Also change oxipay_api_key to yours `$signature = $this->oxipay_sign($oxi, 'OXIPAY_API_KEY');`

## References
Please see official [oxipay](http://docs.oxipay.co.nz/) documantation for more information.
