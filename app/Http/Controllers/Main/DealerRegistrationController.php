<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Main\UserDealershipService;
use App\Models\Settings\Profile;
use App\Models\Main\DealershipCategory;
use App\Models\Others\DealerRegistrationStatus;
// Notifications
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class DealerRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mCurrentUser= auth()->user();
        $mCurrentUser?->load('role');
        // return $mCurrentUser->role?->type_id;
        if($mCurrentUser->role?->type_id==1){
            return User::with(['profile','dealerRegistrationStatus'])->where('role_id', 34)->orderBy('created_at', 'desc')->paginate(10);
        }else{
            return User::with(['profile','dealerRegistrationStatus'])->where('role_id', 34)->where('user_id', $mCurrentUser->id)->orderBy('created_at', 'desc')->paginate(10);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required|string',
            'brief_company_profile' => 'required|string',
            'directors_of_dealership' => 'required|string',
            'category_id' => 'required|string',
            // 'category_id.*' => 'required|integer|exists:categories,id',
            'engaged_persons_professional_skills' => 'required|file|mimes:pdf|max:40960',
        ]);

        // return $request->category_id;

        $userId = $fields['user_id'];
        $item = User::where('id', $userId)->update([
            'role_id' => 34,//Dealer,
        ]);

        // DeleteOld
        $categoryIds = explode(',', $request->category_id);
        UserDealershipService::where('user_id', $userId)->delete();
        foreach ($categoryIds as $categoryId) {
            UserDealershipService::create([
                'user_id' => $userId,
                'category_id' => $categoryId,
            ]);
        }

        $path_uploads = config('app.paths.file_upload');
        $mEngagedPersonsProfessionalSkills=null;
        if ($request->hasFile('engaged_persons_professional_skills')){
            $mEngagedPersonsProfessionalSkills = time().uniqid().'.'.$request->engaged_persons_professional_skills->extension();
            $request->engaged_persons_professional_skills->storeAs($path_uploads, $mEngagedPersonsProfessionalSkills, 'public');
        }
        $item = Profile::updateOrCreate(['user_id' => $userId],[
            'brief_company_profile' => $fields['brief_company_profile'],
            'directors_of_dealership' => $fields['directors_of_dealership'],
            'engaged_persons_professional_skills' => $mEngagedPersonsProfessionalSkills,
        ]);

        // Notification
        $mUser = User::find($userId);
        $email = $mUser->email;
        $subject = 'Dealer Registration - Acknowledgement';
        $message = "<div>
            <p>We are glad to inform you that your application has been received.</p>
        </div>";
        $data = array(
            'name' => $mUser->name,
            'subject' => $subject,
            'url' => config('app.url').'/#/dealer-registrations/show/'.$item->id,
            'btn-text' => 'View',
            'message' => $message,
            'file' => null,
            'file_name' => null
        );
        Mail::to($email)->send(new AlertMail($data));

        $users = User::whereIn('role_id', [2])->get();//Compliance
        foreach ($users as $key => $mUser) {
            $message = "<div>
                <p>You have an new application to act on.</p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'Dealer Registration - New',
                'url' => config('app.url').'/#/dealer-registrations/process/'.$item->id,
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
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::with(['profile','dealershipServices','dealerRegistrationStatus'])->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'user_id' => 'required|string',
            'brief_company_profile' => 'required|string',
            'directors_of_dealership' => 'required|string',
            'category_id' => 'required|string',
            // 'category_id.*' => 'required|integer|exists:categories,id',
            'engaged_persons_professional_skills' => 'required|file|mimes:pdf|max:40960',
        ]);


        $userId = $fields['user_id'];
        $item = User::where('id', $userId)->update([
            'role_id' => 34,//Dealer,
            'dealer_registration_status_id' => 3,
        ]);

        // DeleteOld
        $categoryIds = explode(',', $request->category_id);
        UserDealershipService::where('user_id', $userId)->delete();
        foreach ($categoryIds as $categoryId) {
            UserDealershipService::create([
                'user_id' => $userId,
                'category_id' => $categoryId,
            ]);
        }

        $path_uploads = config('app.paths.file_upload');
        $mEngagedPersonsProfessionalSkills=null;
        if ($request->hasFile('engaged_persons_professional_skills')){
            $mEngagedPersonsProfessionalSkills = time().uniqid().'.'.$request->engaged_persons_professional_skills->extension();
            $request->engaged_persons_professional_skills->storeAs($path_uploads, $mEngagedPersonsProfessionalSkills, 'public');
        }
        // $item2 = Profile::where('id', $id)->update([
        $item = Profile::updateOrCreate(['user_id' => $userId],[
            'brief_company_profile' => $fields['brief_company_profile'],
            'directors_of_dealership' => $fields['directors_of_dealership'],
            'engaged_persons_professional_skills' => $mEngagedPersonsProfessionalSkills,
        ]);

        // Notification
        $mUser = User::find($userId);
        $email = $mUser->email;
        $subject = 'Re-submitted Dealer Registration - Acknowledgement';
        $message = "<div>
            <p>We are glad to inform you that your application has been received.</p>
        </div>";
        $data = array(
            'name' => $mUser->name,
            'subject' => $subject,
            'url' => config('app.url').'/#/dealer-registrations/show/'.$id,
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
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'Dealer Registration - Re-submitted',
                'url' => config('app.url').'/#/dealer-registrations/process/'.$id,
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
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::with('profile')->find($id);
            UserDealershipService::where('user_id', $id)->delete();
            // Update
            $item = User::find($item->user_id);
            $item->role_id = null;
            $item->save();
        // Remove
        $path_downloads = config('app.paths.file_download');
        $file_url = public_path($path_downloads.$item->profile->engaged_persons_professional_skills);
    // $item->delete();

        $response = [
            'message' => 'Dealer removed successfully',
            'data' => $item
        ];
        return response($response, 200);

        $response = [
            'message' => 'User removed successfully',
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

        $term = $fields['search_term'];
        $items = User::with(['role','status'])->where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('email','LIKE','%'.$term.'%');
            $query->orWhereHas('role', function($q) use ($term) {
                $q->where(function($q) use ($term) {
                    $q->where('name', 'LIKE', '%' . $term . '%');
                    $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                });
            });
            $query->orWhereHas('status', function($q) use ($term) {
                $q->where(function($q) use ($term) {
                    $q->where('name', 'LIKE', '%' . $term . '%');
                    $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                });
            });
        })->get();

        $response = [
            'status' => 'success',
            'message' => 'Users search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $mCurrentUser= auth()->user();
        $users = User::when($mCurrentUser->role_id != 1, function ($query) use ($mCurrentUser) {
            $query->where('user_id', $mCurrentUser->id);
        })->orderBy('name', 'asc')->get();
        $dealership_categories = DealershipCategory::orderBy('id', 'asc')->get();
        $user_statuses = DealerRegistrationStatus::orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'users' => $users,
                'dealership_categories' => $dealership_categories,
                'user_statuses' => $user_statuses,
            ]
        ];
        return response($response, 200);
    }




    /**
     * generateCertificatePdf
     */
    public function generateCertificatePdf($id)
    {
        $item = User::with(['profile','dealershipServices'])->find($id);
        // return $item;
        // return view('prints.certificates.dealer-registration-certificate-pdf')->with('item', $item);

        $verificationUrl = url(config('app.asset_url').'/api/verify-certificate/' . $item->id);
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->margin(1)->generate($verificationUrl));
        $datePrinted = Carbon::now();
        $data = [
            'item' => $item,
            'qr_code' => $qrCode,
            'date_printed' => $datePrinted,
        ];
        // return $data;

        $dompdf = PDF::loadView('prints.certificates.dealer-registration-certificate-pdf', $data)->setPaper('a4', 'potrait');
        $name = $item->id.'-certificate';

        $dompdf->output();
        $dom_pdf = $dompdf->getDomPDF();
        return $dompdf->download($name.'.pdf');
    }

    /**
     * verifyCertificate
     */
    public function verifyCertificate($id)
    {
        $item = User::find($id);
        if($item){
            return "Certificate is valid";
        }else{
            return "Certificate is invalid";
        }
    }

}
