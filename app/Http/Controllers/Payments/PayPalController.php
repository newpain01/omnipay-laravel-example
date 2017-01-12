<?php

namespace App\Http\Controllers\Payments;

use Omnipay\Omnipay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayPalController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->initialize(array(
                'clientId' => env('PAYPAL_CLIENT_ID', ''),
                'secret'   => env('PAYPAL_SECRET', ''),
                'testMode' => env('PAYPAL_TEST_MODE', true),
            ));

        $card = array(
                        'firstName' => 'FirstName',
                        'lastName' => 'LastName',
                        'number' => $request->ccNo,
                        'expiryMonth'           => $request->expMonth,
                        'expiryYear'            => $request->expYear,
                        'cvv'                   => $request->cvv,
                        'billingAddress1'       => '1 Scrubby Creek Road',
                        'billingCountry'        => 'AU',
                        'billingCity'           => 'Scrubby Creek',
                        'billingPostcode'       => '4999',
                        'billingState'          => 'QLD',
            );

        try {
                $transaction = $gateway->purchase(array(
                    'amount'        => '1.01',
                    'currency'      => 'USD',
                    'description'   => 'This is a test purchase transaction.',
                    'card'          => $card,
                ));
                $response = $transaction->send();
                $data = $response->getData();
                echo "Gateway purchase response data == " . "<pre>" . print_r($data, true) . "</pre>" ."\n";

                if ($response->isSuccessful()) {
                    echo "The transaction was successful! Thank You!\n";
                }
            } catch (\Exception $e) {
                echo "Exception caught while attempting authorize.\n";
                echo "Exception type == " . get_class($e) . "\n";
                echo "Message == " . $e->getMessage() . "\n";
            }

    }

}
