<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Main\Permit;
use App\Models\Main\Payment;
use App\Models\Settings\Tariff;
use App\Models\Settings\CoffeeSpecies;
use App\Models\Settings\CoffeeForm;
use App\Models\Settings\PermitType;
use App\Models\Others\PermitStatus;
// Notifications
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class PermitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mCurrentUser= auth()->user();
        $mCurrentUser?->load('role');
        // return $mCurrentUser->role?->type_id;
        if($mCurrentUser->role?->type_id==2){
            return Permit::with(['user','type','status','payment.status'])->where('user_id', $mCurrentUser->id)->orderBy('created_at', 'desc')->paginate(10);
        }else{
            return Permit::with(['user','type','status','payment.status'])->orderBy('created_at', 'desc')->paginate(10);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'type_id' => 'required|integer',
            'mark' => 'nullable|string',
            'coffee_species_id' => 'required|integer',
            'coffee_form_id' => 'required|integer',
            'number_of_bags' => 'required|integer',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'distance' => 'required|integer',
            'vehicle_registration_number' => 'required|string',
            'driver_name' => 'required|string',
            'driver_id_number' => 'required|string',
            'warehouse_receipt_number' => 'required|string',
        ]);

        // WithSoftDelete
        $nextNumber = Permit::withTrashed()->count()+1;
        $mApplicationNumber = 'PM/'.date('Y').'/'.$nextNumber;
        $paymentId = (string)Str::uuid();
        $mCurrentUser= auth()->user();
        $item = Permit::create([
            'user_id' => $mCurrentUser->id,
            'application_number' => $mApplicationNumber,
            'type_id' => $fields['type_id'],
            'mark' => $fields['mark'],
            'coffee_species_id' => $fields['coffee_species_id'],
            'coffee_form_id' => $fields['coffee_form_id'],
            'number_of_bags' => $fields['number_of_bags'],
            'origin' => $fields['origin'],
            'destination' => $fields['destination'],
            'distance' => $fields['distance'],
            'vehicle_registration_number' => $fields['vehicle_registration_number'],
            'driver_name' => $fields['driver_name'],
            'driver_id_number' => $fields['driver_id_number'],
            'warehouse_receipt_number' => $fields['warehouse_receipt_number'],
            'payment_id' => $paymentId,
        ]);

        $nextNumber = Payment::withTrashed()->count()+1;
        $mInvoiceNumber = 'IN/'.date('Y').'/'.$nextNumber;
        $mTariffId = 1;
        $payment = Payment::updateOrCreate(['id' => $paymentId],[
            'id' => $paymentId,
            'invoice_number' => $mInvoiceNumber,
            'user_id' => $mCurrentUser->id,
            'amount' => Tariff::find($mTariffId)->amount,
            'format' => 'json',
            'service_id' => 1,
            'tariff_id' => $mTariffId,
        ]);

        $mType = PermitType::find($fields['type_id']);
        // Notification
        $email = $mCurrentUser->email;
        $subject = 'Permit Application - Acknowledgement';
        $message = "<div>
            <p>We are glad to inform you that your application has been received.</p>
            <p>
                <strong>Application Number:</strong> {$mApplicationNumber} <br>
                <strong>Permit Type:</strong> {$mType->name} <br>
            </p>
        </div>";
        $data = array(
            'name' => $mCurrentUser->name,
            'subject' => $subject,
            'url' => config('app.url').'/permits/show/'.$item->id,
            'btn-text' => 'Login',
            'message' => $message,
            'file' => null,
            'file_name' => null
        );
        Mail::to($email)->send(new AlertMail($data));

        $users = User::whereIn('role_id', [2,4])->get();//Compliance/Marketing
        foreach ($users as $key => $mUser) {
            $message = "<div>
                <p>You have an new application to act on.</p>
                <p>
                    <strong>Application Number:</strong> {$item->application_number} <br>
                    <strong>Permit Type:</strong> {$mType->name} <br>
                </p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'Permit Application - New',
                'url' => config('app.url').'/permits/process/'.$item->id,
                'btn-text' => 'View',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($mUser->email)->send(new AlertMail($data));
        }

        $response = [
            'status' => 'success',
            'message' => 'Application submitted successfully',
            'data' => [
                'item' => $item,
                'payment' => $payment,
            ],
        ];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Permit::with(['user','type','status','payment.status'])->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'type_id' => 'required|integer',
            'mark' => 'nullable|string',
            'coffee_species_id' => 'required|integer',
            'coffee_form_id' => 'required|integer',
            'number_of_bags' => 'required|integer',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'distance' => 'required|integer',
            'vehicle_registration_number' => 'required|string',
            'driver_name' => 'required|string',
            'driver_id_number' => 'required|string',
            'warehouse_receipt_number' => 'required|string',
        ]);

        $item = Permit::where('id', $id)->update([
            // 'user_id' => $mCurrentUser->id,
            // 'application_number' => $mApplicationNumber,
            'type_id' => $fields['type_id'],
            'mark' => $fields['mark'],
            'coffee_species_id' => $fields['coffee_species_id'],
            'coffee_form_id' => $fields['coffee_form_id'],
            'number_of_bags' => $fields['number_of_bags'],
            'origin' => $fields['origin'],
            'destination' => $fields['destination'],
            'distance' => $fields['distance'],
            'vehicle_registration_number' => $fields['vehicle_registration_number'],
            'driver_name' => $fields['driver_name'],
            'driver_id_number' => $fields['driver_id_number'],
            'warehouse_receipt_number' => $fields['warehouse_receipt_number'],
            'status_id' => 3,//UnderReview
        ]);

        $mCurrentUser= auth()->user();
        $item = Permit::find($id);
        $mTariffId = 1;
        $payment = Payment::updateOrCreate(['id' => $item->payment_id],[
            'user_id' => $mCurrentUser->id,
            'amount' => Tariff::find($mTariffId)->amount,
            'format' => 'json',
            'service_id' => 1,
            'tariff_id' => $mTariffId,
        ]);

        $mType = PermitType::find($fields['type_id']);
        // Notification
        $email = $mCurrentUser->email;
        $subject = 'Permit Re-submitted Application - Acknowledgement';
        $message = "<div>
            <p>We are glad to inform you that your application has been received.</p>
            <p>
                <strong>Application Number:</strong> {$item->application_number} <br>
                <strong>Permit Type:</strong> {$mType->name} <br>
            </p>
        </div>";
        $data = array(
            'name' => $mCurrentUser->name,
            'subject' => $subject,
            'url' => config('app.url').'/permits/show/'.$item->id,
            'btn-text' => 'Login',
            'message' => $message,
            'file' => null,
            'file_name' => null
        );
        Mail::to($email)->send(new AlertMail($data));

        $users = User::whereIn('role_id', [2,4])->get();//Compliance/Marketing
        foreach ($users as $key => $mUser) {
            $message = "<div>
                <p>You have an re-submitted application to act on.</p>
                <p>
                    <strong>Application Number:</strong> {$item->application_number} <br>
                    <strong>Permit Type:</strong> {$mType->name} <br>
                </p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'Permit Application - Re-submitted',
                'url' => config('app.url').'/permits/process/'.$item->id,
                'btn-text' => 'View',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($mUser->email)->send(new AlertMail($data));
        }

        $response = [
            'status' => 'success',
            'message' => 'Application re-submitted successfully',
            'data' => [
                'item' => $item,
                'payment' => $payment,
            ],
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Permit::find($id);
        $item->delete();

        $response = [
            'message' => 'Permit removed successfully',
            'data' => $item
        ];
        return response($response, 200);
    }



    /**
     * searchItems
     */
    public function searchItems(Request $request)
    {
        $fields = $request->validate([
            'search_term' => 'required|string'
        ]);

        $mCurrentUser= auth()->user();
        $mCurrentUser?->load('role');
        $term = $fields['search_term'];
        $items = null;
        if($mCurrentUser->role?->type_id==2){
            $items = Permit::with(['user','type','status','payment.status'])->where('user_id', $mCurrentUser->id)->where(function($query) use($term){
                $query->where('application_number','LIKE','%'.$term.'%');
                $query->orWhere('mark','LIKE','%'.$term.'%');
                $query->orWhere('number_of_bags','LIKE','%'.$term.'%');
                $query->orWhere('origin','LIKE','%'.$term.'%');
                $query->orWhere('destination','LIKE','%'.$term.'%');
                $query->orWhere('driver_name','LIKE','%'.$term.'%');
                $query->orWhere('warehouse_receipt_number','LIKE','%'.$term.'%');
                $query->orWhereHas('status', function($q) use ($term) {
                    $q->where(function($q) use ($term) {
                        $q->where('name', 'LIKE', '%' . $term . '%');
                        $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                    });
                });
            })->orderBy('created_at', 'desc')->get();
         }else{
            $items = Permit::with(['user','type','status','payment.status'])->where(function($query) use($term){
                $query->where('application_number','LIKE','%'.$term.'%');
                $query->orWhere('mark','LIKE','%'.$term.'%');
                $query->orWhere('number_of_bags','LIKE','%'.$term.'%');
                $query->orWhere('origin','LIKE','%'.$term.'%');
                $query->orWhere('destination','LIKE','%'.$term.'%');
                $query->orWhere('driver_name','LIKE','%'.$term.'%');
                $query->orWhere('warehouse_receipt_number','LIKE','%'.$term.'%');
                $query->orWhereHas('status', function($q) use ($term) {
                    $q->where(function($q) use ($term) {
                        $q->where('name', 'LIKE', '%' . $term . '%');
                        $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                    });
                });
            })->orderBy('created_at', 'desc')->get();         }

        $response = [
            'status' => 'success',
            'message' => 'Permits search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $permit_types = PermitType::orderBy('id', 'asc')->get();
        $coffee_species = CoffeeSpecies::orderBy('id', 'asc')->get();
        $coffee_forms = CoffeeForm::orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'permit_types' => $permit_types,
                'coffee_species' => $coffee_species,
                'coffee_forms' => $coffee_forms,
            ]
        ];
        return response($response, 200);
    }



    /**
     * generatePermitPdf
     */
    public function generatePermitPdf($id)
    {
        $item = Permit::with(['user','type','status','coffeeSpecies','coffeeForm'])->find($id);
        // return $item;
        // return view('prints.permit-pdf')->with('item', $item);

        $verificationUrl = url(config('app.asset_url').'/api/verify-permit/' . $item->id);
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->margin(1)->backgroundColor(244, 235, 225)->generate($verificationUrl));
        $datePrinted = Carbon::now();
        $data = [
            'title' => $item->application_number,
            'item' => $item,
            'qr_code' => $qrCode,
            'date_printed' => $datePrinted,
        ];
        // return $data;
        $dompdf = PDF::loadView('prints.permit-pdf', $data)->setPaper('a4', 'potrait');
        $name = preg_replace('/[^A-Za-z0-9_-]/','-',$item->application_number).'- Permit';

        $dompdf->output();
        $dom_pdf = $dompdf->getDomPDF();
        return $dompdf->download($name.'.pdf');
    }

    /**
     * verifyPermit
     */
    public function verifyPermit($id)
    {
        $item = Permit::find($id);
        if($item){
            return "Permit is valid";
        }else{
            return "Permit is invalid";
        }
    }

}
