<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsor;
use Braintree_Transaction;
use Braintree\Gateway;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    public function sponsorIndex($id) {
        $apartment = Apartment::findOrFail($id);
        $sponsors = Sponsor::all();

        return view('ura.sponsors.index', compact('apartment', 'sponsors'));
    }

    public function paymentIndex($id, $sponsor_id) {
        $apartment = Apartment::findOrFail($id);
        $sponsor = Sponsor::findOrFail($sponsor_id);

        return view ('ura.sponsors.show', compact('apartment', 'sponsor'));
    }

    public function getToken(Request $request, Gateway $gateway, $id, $sponsor_id) {

        $clientToken = $gateway->clientToken()->generate();
        $apartment = Apartment::findOrFail($id);
        $sponsor = Sponsor::findOrFail($sponsor_id);
        return view ('ura.sponsors.braintree', compact('clientToken', 'apartment', 'sponsor'));

    }

    public function process(Request $request, Gateway $gateway, $id, $sponsor_id) {

        $apartment = Apartment::findOrFail($id);
        $sponsor = Sponsor::findOrFail($sponsor_id);

        $result = $gateway->transaction()->sale([
            'amount' => $sponsor->price,
            'paymentMethodNonce' => 'fake-valid-visa-nonce',
        ]);

        $currentDate = Carbon::now()->toDateTimeString();

        //$apartment->sponsors()->attach($sponsor_id, ['start_date' => $currentDate, 'end_date' => '2022-12-22 17:00:00']);
        //$sponsor->apartments()->attach($id);

        // $update = DB::table('apartment_sponsor')->update(['apartment_sponsor.start_date' => Carbon::now()->toDateTimeString()]);
        //$apartment->save();

        return response()->json($result);

    }
}
