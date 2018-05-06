<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Afterpay Test</title>        <!-- Fonts -->
        <link href="/css/app.css?v=1" rel="stylesheet">
        <script src="https://portal-sandbox.afterpay.com/afterpay.js" async></script>
    </head>
    <body>
        <div class="container">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Processing Payment</h5>
                </div>
            </div>
        </div>

        <script>
            window.onload = function() {
                AfterPay.initialize({countryCode: "AU"});
                AfterPay.display({token: "{{ $token }}"});
            };
        </script>
    </body>
</html>
