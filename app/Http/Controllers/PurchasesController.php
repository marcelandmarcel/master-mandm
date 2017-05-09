<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\{Stripe, Charge, Customer};

class PurchasesController extends Controller
{
    public function store()
    {

    	Stripe::setApiKey(config('services.stripe.secret'));

    	$customer = Customer::create([
    		'email' => request('stripeEmail'),
    		'source' => request('stripeToken'),

    		]);

    	$charge = Charge::create([
    		'customer' => $customer->id,
    		'currency' => 'eur'

    		]);

	}
}
