<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Main\Payment;
use App\Models\Others\PaymentStatus;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mCurrentUser = auth()->user();
        $mCurrentUser?->load('role');
        // return $mCurrentUser->role?->type_id;
        if($mCurrentUser->role?->type_id==2){
            return Payment::with(['user','service','tariff','status'])->where('user_id', $mCurrentUser->id)->paginate(10);
        }
        return Payment::with(['user','service','tariff','status'])->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Payment::with(['user','service','tariff','status'])->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }





    /**
     * invoiceItem
     */
    public function invoiceItem(string $id)
    {
        $item = Payment::with(['user','status','service','tariff'])->find($id);
        return $item;

        // Static
        $apiClientID = config('app.PESAFLOW.api_client_id');
        $secret = config('app.PESAFLOW.secret');
        $key = config('app.PESAFLOW.key');
        $serviceID = config('app.PESAFLOW.service_id');

        // Inputed
        $amountExpected = $item->amount; //+$item->convenience_fee;
        $clientIDNumber = $item->user->profile?->id_number;
        $currency = $item->currency ?? 'KES';
        $billRefNumber = $item->invoice_number;
        $billDesc = $item->title;
        $clientName = $item->user->name;

        // createDataString
        $data_string = $apiClientID.$amountExpected.$serviceID.$clientIDNumber.$currency.$billRefNumber.$billDesc.$clientName.$secret;
        $hash = hash_hmac('sha256', $data_string, $key);
        $secureHash = base64_encode($hash);

        // Add
        $apiClientID = $apiClientID;
        $pictureURL = asset('images/logo_main.png');
        $notificationURL = config('app.url').'/payments/settled/'.$id;
        $callBackURLOnSuccess = config('app.url').'/payments/settled/'.$id;
        $format = 'json'; #"html";
        $accountNumber = null;

        $item->update([
            'pesaflow_service_id' => $serviceID,
            'secure_hash' => $secureHash,
            'picture_url' => $pictureURL,
            'notification_url' => $notificationURL,
            'currency' => $currency,
            'api_client_id' => $apiClientID,
            'format' => $format,
            'account_number' => $accountNumber,
            'callback_url_on_success' => $callBackURLOnSuccess,
        ]);
        // return $item;

        $data = [
            'serviceID'            => $item->pesaflow_service_id,
            'secureHash'           => $item->secure_hash,
            'pictureURL'           => $item->picture_url,
            'notificationURL'      => $item->notification_url,
            'currency'             => $item->currency,
            'clientName'           => $item->user->name,
            'clientMSISDN'         => $item->user->phone ?? '',
            'clientIDNumber'       => $item->user->id_number ?? '',
            'clientEmail'          => $item->user->email,
            'callBackURLOnSuccess' => $item->callback_url_on_success,
            'billRefNumber'        => $item->invoice_number,
            'billDesc'             => $item->tariff->name ?? '',
            'apiClientID'          => $item->api_client_id,
            'amountExpected'       => $item->amount, #+$item->convenience_fee,
            'format'               => $item->format,
        ];
        $url = Config::get('app.PESAFLOW.url');
        $response = Http::withOptions([
            'verify' => false,
        ])
        ->asMultipart()
        ->post($url, $data);
        // return $response->body();

        $result = $response->body();
        $mResult = json_decode($result);
        $item->update([
            'pesaflow_invoice_number' => $mResult->invoice_number,
            'pesaflow_invoice_link'   => $mResult->invoice_link,
        ]);

        $response =[
            'status' => 'success',
            'message' => 'Invoice generated successfully',
            'data' => json_decode($result)
        ];
        return response($response, 201);
    }


    /**
     * receiptPdf
     */
    public function receiptPdf($id)
    {
        $item = Payment::with(['user','service','tariff','status'])->find($id);
        // return $item;
        // return view('prints.receipt-pdf')->with('item', $item);

        $data = [
            'item' => $item,
        ];
        // return $data;
        $dompdf = PDF::loadView('prints.receipt-pdf', $data)->setPaper('a4', 'potrait');
        $name = preg_replace('/[^A-Za-z0-9_-]/','-',$item->invoice_number).'- Receipt';

        $dompdf->output();
        $dom_pdf = $dompdf->getDomPDF();
        return $dompdf->download($name.'.pdf');
    }


    /**
     * settledItem
     */
    public function settledItem( string $id)
    {
        $item = Payment::where('id', $id)->update([
            'status_id' => 2,
            'settled_at' => now(),
        ]);

        $response =[
            'status' => 'success',
            'message' => 'Status updated successfully',
            'data' => $item
        ];
        return response($response, 201);
    }


}
