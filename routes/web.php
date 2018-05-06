<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cancel', function () {
    return view('cancelled');
});

Route::get('/confirm', function () {
	$api = \App::make('afterpay_merchant_payments');
	$api::capture( session('aptoken') );
    return view('confirmed');
});

Route::post('/createpayment', function () {
	$consumer = new \CultureKings\Afterpay\Model\Merchant\Consumer();
	$consumer->setGivenNames(request('givenname'));
	$consumer->setSurname(request('surname'));
	$consumer->setEmail(request('email'));
	$consumer->setPhoneNumber(request('telephone'));

	$merchantOptions = new \CultureKings\Afterpay\Model\Merchant\MerchantOptions();
	$merchantOptions->setRedirectConfirmUrl('http://afterpay.test/confirm');
	$merchantOptions->setRedirectCancelUrl('http://afterpay.test/cancel');

	$totalAmount = new \CultureKings\Afterpay\Model\Money();
	$totalAmount->setAmount(20);
	$totalAmount->setCurrency('AUD');

	$orderDetails = new \CultureKings\Afterpay\Model\Merchant\OrderDetails();
	$orderDetails->setConsumer($consumer);
	$orderDetails->setMerchant($merchantOptions);
	$orderDetails->setTotalAmount($totalAmount);

	$api = \App::make('afterpay_merchant_orders');
	$orderToken = $api::create($orderDetails);
	$token = $orderToken->getToken();
	request()->session()->flash('aptoken', $token);
	return view( 'payment', compact('token') );
});