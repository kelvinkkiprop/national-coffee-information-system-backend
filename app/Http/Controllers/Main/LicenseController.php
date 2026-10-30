<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Main\License;
use App\Models\Main\Payment;
use App\Models\Settings\Tariff;
use App\Models\Settings\LicenseType;
use App\Models\Settings\LicenseCategory;
use App\Models\Others\LicenseStatus;
// Notifications
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class LicenseController extends Controller
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
            return License::with(['user','type','category','status','payment.status'])->where('user_id', $mCurrentUser->id)->orderBy('created_at', 'desc')->paginate(10);
        }else{
            return License::with(['user','type','category','status','payment.status'])->orderBy('created_at', 'desc')->paginate(10);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'category_id' => 'required|integer',
            'type_id' => 'required|integer',
            'financial_year' => 'required|string',
            'expiry_date' => 'required|date',
            'coffee_tasting_expert_certificate' => 'nullable|required_if:type_id,5|file|mimes:pdf|max:40960',
            'commitment_declaration' => 'required|string',
        ]);

        $path_uploads = config('app.paths.file_upload');
        $mCoffeeTastingExpertCertificate=null;
        if ($request->hasFile('coffee_tasting_expert_certificate')){
            $mCoffeeTastingExpertCertificate = time().uniqid().'.'.$request->coffee_tasting_expert_certificate->extension();
            $request->coffee_tasting_expert_certificate->storeAs($path_uploads, $mCoffeeTastingExpertCertificate, 'public');
        }

        // WithSoftDelete
        $nextNumber = License::withTrashed()->count()+1;
        $mApplicationNumber = 'LI/'.date('Y').'/'.$nextNumber;
        $paymentId = (string)Str::uuid();
        $mCurrentUser= auth()->user();
        $item = License::create([
            'user_id' => $mCurrentUser->id,
            'application_number' => $mApplicationNumber,
            'category_id' => $fields['category_id'],
            'type_id' => $fields['type_id'],
            'financial_year' => $fields['financial_year'],
            'expiry_date' => $fields['expiry_date'],
            'coffee_tasting_expert_certificate' => $mCoffeeTastingExpertCertificate,
            'commitment_declaration' => filter_var($fields['commitment_declaration'], FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'payment_id' => $paymentId,
        ]);

        $nextNumber = Payment::withTrashed()->count()+1;
        // $mInvoiceNumber = 'IN/'.date('Y').'/'.$nextNumber;
        $mInvoiceNumber = 'IN//'.date('Y').'//'.$nextNumber;
        $mTariffId = 2;
        $payment = Payment::updateOrCreate(['id' => $paymentId],[
            'id' => $paymentId,
            'invoice_number' => $mInvoiceNumber,
            'user_id' => $mCurrentUser->id,
            'amount' => Tariff::find($mTariffId)->amount,
            'format' => 'json',
            'service_id' => 2,
            'tariff_id' => $mTariffId,
        ]);

        $mType = LicenseType::find($fields['type_id']);
        // Notification
        $email = $mCurrentUser->email;
        $subject = 'License Application - Acknowledgement';
        $message = "<div>
            <p>We are glad to inform you that your application has been received.</p>
            <p>
                <strong>Application Number:</strong> {$mApplicationNumber} <br>
                <strong>License Type:</strong> {$mType->name} <br>
            </p>
        </div>";
        $data = array(
            'name' => $mCurrentUser->name,
            'subject' => $subject,
            'url' => config('app.url').'/#/permits/show/'.$item->id,
            'btn-text' => 'View',
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
                    <strong>License Type:</strong> {$mType->name} <br>
                </p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'License Application - New',
                'url' => config('app.url').'/#/permits/process/'.$item->id,
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
        return License::with(['user','type','category','status','payment.status'])->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'category_id' => 'required|integer',
            'type_id' => 'required|integer',
            'financial_year' => 'required|string',
            'expiry_date' => 'required|date',
            'coffee_tasting_expert_certificate' => 'nullable|required_if:type_id,5|file|mimes:pdf|max:40960',
            'commitment_declaration' => 'required|string',
        ]);

        // DeleteOld
        $path_downloads = config('app.paths.file_download');
        $item = License::find($id);
        $file_url = public_path($path_downloads.$item->coffee_tasting_expert_certificate);
        if(File::exists($file_url)){File::delete($file_url);}

        $path_uploads = config('app.paths.file_upload');
        $mCoffeeTastingExpertCertificate=null;
        if ($request->hasFile('coffee_tasting_expert_certificate')){
            $mCoffeeTastingExpertCertificate = time().uniqid().'.'.$request->coffee_tasting_expert_certificate->extension();
            $request->coffee_tasting_expert_certificate->storeAs($path_uploads, $mCoffeeTastingExpertCertificate, 'public');
        }
        $item = License::where('id', $id)->update([
            // 'user_id' => $mCurrentUser->id,
            // 'application_number' => $mApplicationNumber,
            'category_id' => $fields['category_id'],
            'type_id' => $fields['type_id'],
            'financial_year' => $fields['financial_year'],
            'expiry_date' => $fields['expiry_date'],
            'coffee_tasting_expert_certificate' => $mCoffeeTastingExpertCertificate,
            'commitment_declaration' => filter_var($fields['commitment_declaration'], FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'status_id' => 3,//UnderReview
        ]);

        $mCurrentUser= auth()->user();
        $item = License::find($id);
        $mTariffId = 2;
        $payment = Payment::updateOrCreate(['id' => $item->payment_id],[
            'user_id' => $mCurrentUser->id,
            'amount' => Tariff::find($mTariffId)->amount,
            'format' => 'json',
            'service_id' => 2,
            'tariff_id' => $mTariffId,
        ]);

        $mType = LicenseType::find($fields['type_id']);
        // Notification
        $email = $mCurrentUser->email;
        $subject = 'License Re-submitted Application - Acknowledgement';
        $message = "<div>
            <p>We are glad to inform you that your application has been received.</p>
            <p>
                <strong>Application Number:</strong> {$item->application_number} <br>
                <strong>License Type:</strong> {$mType->name} <br>
            </p>
        </div>";
        $data = array(
            'name' => $mCurrentUser->name,
            'subject' => $subject,
            'url' => config('app.url').'/#/permits/show/'.$item->id,
            'btn-text' => 'View',
            'message' => $message,
            'file' => null,
            'file_name' => null
        );
        Mail::to($email)->send(new AlertMail($data));

        $users = User::whereIn('role_id', [2])->get();//Compliance
        foreach ($users as $key => $mUser) {
            $message = "<div>
                <p>You have an re-submitted application to act on.</p>
                <p>
                    <strong>Application Number:</strong> {$item->application_number} <br>
                    <strong>License Type:</strong> {$mType->name} <br>
                </p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'License Application - Re-submitted',
                'url' => config('app.url').'/#/permits/process/'.$item->id,
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
        $item = License::find($id);
            $path_downloads = config('app.paths.file_download');
            $file_url = public_path($path_downloads.$item->coffee_tasting_expert_certificate);
        $item->delete();

        $response = [
            'message' => 'License removed successfully',
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
            $items = License::with(['user','type','category','status','payment.status'])->where('user_id', $mCurrentUser->id)->where(function($query) use($term){
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
            $items = License::with(['user','type','category','status','payment.status'])->where(function($query) use($term){
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
        $license_types = LicenseType::orderBy('id', 'asc')->get();
        $license_categories = LicenseCategory::orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'license_types' => $license_types,
                'license_categories' => $license_categories,
            ]
        ];
        return response($response, 200);
    }



    /**
     * generateLicensePdf
     */
    public function generateLicensePdf($id)
    {
        $item = License::with(['user','type','category','status'])->find($id);
        // return $item;
        // return view('prints.licenses.coffee-buyer-license-pdf')->with('item', $item);

        $verificationUrl = url(config('app.asset_url').'/api/verify-license/' . $item->id);
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->margin(1)->backgroundColor(244, 235, 225)->generate($verificationUrl));
        $datePrinted = Carbon::now();
        $data = [
            'title' => $item->application_number,
            'item' => $item,
            'qr_code' => $qrCode,
            'date_printed' => $datePrinted,
        ];
        // return $data;
        if($item->type_id==1){//CoffeeBuyer
            $dompdf = PDF::loadView('prints.licenses.coffee-buyer-license-pdf', $data)->setPaper('a4', 'potrait');
        }elseif($item->type_id==3){//CoffeeAgent
        // }else{
            $dompdf = PDF::loadView('prints.licenses.coffee-agent-license-pdf', $data)->setPaper('a4', 'potrait');
        }else{
            $response = [
                'status' => 'failed',
                'message' => 'License category not found',
            ];
            return response($response, 200);
        }
        $name = preg_replace('/[^A-Za-z0-9_-]/','-',$item->application_number).'- License';

        $dompdf->output();
        $dom_pdf = $dompdf->getDomPDF();
        return $dompdf->download($name.'.pdf');
    }

    /**
     * verifyLicense
     */
    public function verifyLicense($id)
    {
        $item = License::find($id);
        if($item){
            return "License is valid";
        }else{
            return "License is invalid";
        }
    }

}
