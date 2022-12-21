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

        // la funzione calcola il giorno di scadenza dello sponsor acquistato
        function getEndDate($sponsorId) {
            $today = Carbon::now();

            if ($sponsorId == 1) {

                return $today->addDays(1)->toDateTimeString();

            } elseif ($sponsorId == 2) {

                return $today->addDays(3)->toDateTimeString();

            } else {

                return $today->addDays(6)->toDateTimeString();
            }
        }
        // ---------------------------------------------------------------
        $currentDate = Carbon::now()->toDateTimeString();

        $apartment -> sponsors()->sync($sponsor);

        $update = DB::table('apartment_sponsor')
        ->where('apartment_sponsor.apartment_id', '=', $id)
        ->update(['apartment_sponsor.start_date' => $currentDate,
        'apartment_sponsor.end_date' => getEndDate($sponsor_id)
        ]);

        $apartment->save();

        return response()->json($result);

    }
}

