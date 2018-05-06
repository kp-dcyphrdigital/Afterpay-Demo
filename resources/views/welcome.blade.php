<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AfterPay Test</title>        <!-- Fonts -->
        <link href="/css/app.css?v=1" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Checkout</h5>

                    <form method="post" action="/createpayment">
                        
                        @csrf

                        <div class="form-group">
                        <label for="givenname">First Name</label>
                        <input type="text" class="form-control" name="givenname">
                        </div>

                        <div class="form-group">
                        <label for="surname">Last Name</label>
                        <input type="text" class="form-control" name="surname">
                        </div>

                        <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                        <label for="telephone">Mobile</label>
                        <input type="tel" class="form-control" name="telephone">
                        </div>

                        <div class="form-group">
                        <p class="card-text">Total Cart Value $20.00</p>
                        <button type="submit" class="btn btn-primary">Checkout with AfterPay</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>
