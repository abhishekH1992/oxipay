<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Pay {{ env('AMOUNT') }} NZD with Oxipay
                </div>

                <div class="links">
                    <form method="POST" id="payment-form" role="form"  action="https://securesandbox.oxipay.co.nz/Checkout?platform=Default">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="x_amount" value="{{env('AMOUNT')}}">
                            <input type="hidden" name="x_account_id" value="{{env('ACCOUNT_ID')}}">
                            <input type="hidden" name="x_currency" value="{{env('CURRENCY')}}">
                            <input type="hidden" name="x_reference" value="{{$ref}}">
                            <input type="hidden" name="x_shop_country" value="{{env('COUNTRY_CODE')}}">
                            <input type="hidden" name="x_shop_name" value="{{env('SHOP_NAME')}}">
                            <input type="hidden" name="x_signature" value="{{$signature}}">
                            <input type="hidden" name="x_url_callback" value="{{env('CALLBACK_URL')}}">
                            <input type="hidden" name="x_url_complete" value="{{env('COMPLETE_URL')}}">
                            <input type="hidden" name="x_url_cancel" value="{{env('CANCEL_URL')}}">
                            <input type="hidden" name="x_test" value="{{env('TEST')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Pay with Oxipay</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
