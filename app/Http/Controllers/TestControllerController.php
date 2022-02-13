<?php

namespace App\Http\Controllers;

use App\TestController;
use Illuminate\Http\Request;
use Paytabscom\Laravel_paytabs\Facades\paypage;


class TestControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay = paypage::sendPaymentCode('all')

            ->sendTransaction('sale')

            ->sendCart(10, 1000, 'test')

            ->sendCustomerDetails('Walaa Elsaeed', 'w.elsaeed@paytabs.com', '0101111111', 'test', 'Nasr City', 'Cairo', 'EG', '1234', '100.279.20.10')

            ->sendShippingDetails('Walaa Elsaeed', 'w.elsaeed@paytabs.com', '0101111111', 'test', 'Nasr City', 'Cairo', 'EG', '1234', '100.279.20.10')

            ->sendURLs('http://localhost:8000/test', 'http://localhost:8000/paymentIPN')

            ->sendLanguage('en')

            ->create_pay_page();

        return $pay;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestController  $testController
     * @return \Illuminate\Http\Response
     */
    public function show(TestController $testController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestController  $testController
     * @return \Illuminate\Http\Response
     */
    public function edit(TestController $testController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestController  $testController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestController $testController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestController  $testController
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestController $testController)
    {
        //
    }
}
