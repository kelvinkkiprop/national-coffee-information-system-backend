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
use App\Models\Main\DealerRegistration;
use App\Models\Main\UserDealershipService;
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
        $mCurrentUser = auth()->user();
        $mCurrentUser->loadMissing('role');

        return DealerRegistration::with(['user', 'status','dealershipServices'])->when($mCurrentUser->role?->type_id != 1, fn($query) =>
            $query->where('user_id', $mCurrentUser->id)
        )->latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Normalize "undefined" and "null"
        $mFileFields = [
            // Common
            'certificate_of_incorporation_or_registration',
            'directors_details_id_passport_and_kra_pins',
            'tax_compliance_certificate',
            // 20_Coffee_Training_School
            'premises_ownership_or_lease_document',
            'training_equipment_inventory',
            'course_outline_and_training_curriculum',
            'names_qualifications_and_certificates_of_trainers',
            'education_or_training_accreditation_certificate',
            'public_health_certificate',
            // 21_Event_Organisers
            'company_profile',
             // 22_Coffee_Projects
            'project_document',
            'county_government_support_letters_and_mou',
            'implementation_plan_monitoring_and_evaluation_framework',
        ];
        foreach ($mFileFields as $field) {
            if (in_array($request->input($field), ['undefined', 'null', ''], true)) {
                $request->merge([$field => null]);
            }
        }

        $fields = $request->validate([
            'user_id' => 'required|string',
            'category_id' => 'required|string',
            // 'category_id.*' => 'required|integer|exists:categories,id',
            // Common
            'certificate_of_incorporation_or_registration' => 'required_if:category_id,20,21,22,23|nullable|file|mimes:pdf|max:40960',
            'directors_details_id_passport_and_kra_pins' => 'required_if:category_id,20,21,22,23|nullable|file|mimes:pdf|max:40960',
            'tax_compliance_certificate' => 'required_if:category_id,20,21,23|nullable|file|mimes:pdf|max:40960',
            // 20_Coffee_Training_School
            'premises_ownership_or_lease_document' => 'required_if:category_id,20|nullable|file|mimes:pdf|max:40960',
            'training_equipment_inventory' => 'required_if:category_id,20|nullable|file|mimes:pdf|max:40960',
            'course_outline_and_training_curriculum' => 'required_if:category_id,20|nullable|file|mimes:pdf|max:40960',
            'names_qualifications_and_certificates_of_trainers' => 'required_if:category_id,20|nullable|file|mimes:pdf|max:40960',
            'education_or_training_accreditation_certificate' => 'required_if:category_id,20|nullable|file|mimes:pdf|max:40960',
            'public_health_certificate' => 'required_if:category_id,20|nullable|file|mimes:pdf|max:40960',
            // 21_Event_Organisers
            'company_profile' => 'required_if:category_id,21|nullable|file|mimes:pdf|max:40960',
            // 22_Coffee_Projects
            'project_document' => 'required_if:category_id,22|nullable|file|mimes:pdf|max:40960',
            'county_government_support_letters_and_mou' => 'required_if:category_id,22|nullable|file|mimes:pdf|max:40960',
            'implementation_plan_monitoring_and_evaluation_framework' => 'required_if:category_id,22|nullable|file|mimes:pdf|max:40960',
            'cooperative_society_id' => 'nullable|string',
        ]);

        // return $request->category_id;

        $userId = $fields['user_id'];
        $item = User::where('id', $userId)->update([
            'role_id' => 34,//Dealer,
        ]);

        $path_uploads = config('app.paths.file_upload');
        // Common
        $mCertificateOfIncorporationOrRegistration=null;
        if ($request->hasFile('certificate_of_incorporation_or_registration')){
            $mCertificateOfIncorporationOrRegistration = time().uniqid().'.'.$request->certificate_of_incorporation_or_registration->extension();
            $request->certificate_of_incorporation_or_registration->storeAs($path_uploads, $mCertificateOfIncorporationOrRegistration, 'public');
        }
        $mDirectorsDetailsIdPassportAndKraPins=null;
        if ($request->hasFile('directors_details_id_passport_and_kra_pins')){
            $mDirectorsDetailsIdPassportAndKraPins = time().uniqid().'.'.$request->directors_details_id_passport_and_kra_pins->extension();
            $request->directors_details_id_passport_and_kra_pins->storeAs($path_uploads, $mDirectorsDetailsIdPassportAndKraPins, 'public');
        }
        $mTaxComplianceCertificate=null;
        if ($request->hasFile('tax_compliance_certificate')){
            $mTaxComplianceCertificate = time().uniqid().'.'.$request->tax_compliance_certificate->extension();
            $request->tax_compliance_certificate->storeAs($path_uploads, $mTaxComplianceCertificate, 'public');
        }
        // 20_Coffee_Training_School
        $mPremisesOwnershipOrLeaseDocument=null;
        if ($request->hasFile('premises_ownership_or_lease_document')){
            $mPremisesOwnershipOrLeaseDocument = time().uniqid().'.'.$request->premises_ownership_or_lease_document->extension();
            $request->premises_ownership_or_lease_document->storeAs($path_uploads, $mPremisesOwnershipOrLeaseDocument, 'public');
        }
        $mTrainingEquipmentInventory=null;
        if ($request->hasFile('training_equipment_inventory')){
            $mTrainingEquipmentInventory = time().uniqid().'.'.$request->training_equipment_inventory->extension();
            $request->training_equipment_inventory->storeAs($path_uploads, $mTrainingEquipmentInventory, 'public');
        }
        $mCourseOutlineAndTrainingCurriculum=null;
        if ($request->hasFile('course_outline_and_training_curriculum')){
            $mCourseOutlineAndTrainingCurriculum = time().uniqid().'.'.$request->course_outline_and_training_curriculum->extension();
            $request->course_outline_and_training_curriculum->storeAs($path_uploads, $mCourseOutlineAndTrainingCurriculum, 'public');
        }
        $mNamesQualificationsAndCertificatesOfTrainers=null;
        if ($request->hasFile('names_qualifications_and_certificates_of_trainers')){
            $mNamesQualificationsAndCertificatesOfTrainers = time().uniqid().'.'.$request->names_qualifications_and_certificates_of_trainers->extension();
            $request->names_qualifications_and_certificates_of_trainers->storeAs($path_uploads, $mNamesQualificationsAndCertificatesOfTrainers, 'public');
        }
        $mEducationOrTrainingAccreditationCertificate=null;
        if ($request->hasFile('education_or_training_accreditation_certificate')){
            $mEducationOrTrainingAccreditationCertificate = time().uniqid().'.'.$request->education_or_training_accreditation_certificate->extension();
            $request->education_or_training_accreditation_certificate->storeAs($path_uploads, $mNamesQualificationsAndCertificatesOfTrainers, 'public');
        }
        $mPublicHealthCertificate=null;
        if ($request->hasFile('public_health_certificate')){
            $mPublicHealthCertificate = time().uniqid().'.'.$request->public_health_certificate->extension();
            $request->public_health_certificate->storeAs($path_uploads, $mPublicHealthCertificate, 'public');
        }
        // 21_Event_Organisers
        $mCompanyProfile=null;
        if ($request->hasFile('company_profile')){
            $mCompanyProfile = time().uniqid().'.'.$request->company_profile->extension();
            $request->company_profile->storeAs($path_uploads, $mCompanyProfile, 'public');
        }
        // 22_Coffee_Projects
        $mProjectDocument=null;
        if ($request->hasFile('project_document')){
            $mProjectDocument = time().uniqid().'.'.$request->project_document->extension();
            $request->project_document->storeAs($path_uploads, $mProjectDocument, 'public');
        }
        $mCountyGovernmentSupportLettersAndMou=null;
        if ($request->hasFile('county_government_support_letters_and_mou')){
            $mCountyGovernmentSupportLettersAndMou = time().uniqid().'.'.$request->county_government_support_letters_and_mou->extension();
            $request->county_government_support_letters_and_mou->storeAs($path_uploads, $mCountyGovernmentSupportLettersAndMou, 'public');
        }
        $mImplementationPlanMonitoringAndEvaluationFramework=null;
        if ($request->hasFile('implementation_plan_monitoring_and_evaluation_framework')){
            $mImplementationPlanMonitoringAndEvaluationFramework = time().uniqid().'.'.$request->implementation_plan_monitoring_and_evaluation_framework->extension();
            $request->implementation_plan_monitoring_and_evaluation_framework->storeAs($path_uploads, $mImplementationPlanMonitoringAndEvaluationFramework, 'public');
        }

        $nextNumber = DealerRegistration::withTrashed()->count()+1;
        $mApplicationNumber = 'DLR/'.date('Y').'/'.$nextNumber;
        $item = DealerRegistration::updateOrCreate(['user_id' => $userId],[
            'application_number' => $mApplicationNumber,
            // Common
            'certificate_of_incorporation_or_registration' => $mCertificateOfIncorporationOrRegistration,
            'directors_details_id_passport_and_kra_pins' => $mDirectorsDetailsIdPassportAndKraPins,
            'tax_compliance_certificate' => $mTaxComplianceCertificate,
            // 2_Grower
            'cooperative_society_id' => $fields['cooperative_society_id'],
            // 20_Coffee_Training_School
            'premises_ownership_or_lease_document' => $mPremisesOwnershipOrLeaseDocument,
            'training_equipment_inventory' => $mTrainingEquipmentInventory,
            'course_outline_and_training_curriculum' => $mCourseOutlineAndTrainingCurriculum,
            'names_qualifications_and_certificates_of_trainers' => $mNamesQualificationsAndCertificatesOfTrainers,
            'education_or_training_accreditation_certificate' => $mEducationOrTrainingAccreditationCertificate,
            'public_health_certificate' => $mPublicHealthCertificate,
            // 21_Event_Organisers
            'company_profile' => $mCompanyProfile,
            // 22_Coffee_Projects
            'project_document' => $mProjectDocument,
            'county_government_support_letters_and_mou' => $mCountyGovernmentSupportLettersAndMou,
            'implementation_plan_monitoring_and_evaluation_framework' => $mImplementationPlanMonitoringAndEvaluationFramework,
        ]);
        $categoryIds = explode(',', $request->category_id);
        foreach ($categoryIds as $categoryId) {
            UserDealershipService::create([
                'dealer_registration_id' => $item->id,
                'user_id' => $userId,
                'category_id' => $categoryId,
            ]);
        }

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
        return DealerRegistration::with(['user', 'status','dealershipServices'])->find($id);
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
            'certificate_of_incorporation_or_registration' => 'required_if:category_id,21,23|nullable|file|mimes:pdf|max:40960',
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
        $mCertificateOfIncorporationOrRegistration=null;
        if ($request->hasFile('certificate_of_incorporation_or_registration')){
            $mCertificateOfIncorporationOrRegistration = time().uniqid().'.'.$request->certificate_of_incorporation_or_registration->extension();
            $request->certificate_of_incorporation_or_registration->storeAs($path_uploads, $mCertificateOfIncorporationOrRegistration, 'public');
        }
        // $item2 = DealerRegistration::where('id', $id)->update([
        $item = DealerRegistration::updateOrCreate(['user_id' => $userId],[
            'brief_company_profile' => $fields['brief_company_profile'],
            'directors_of_dealership' => $fields['directors_of_dealership'],
            'certificate_of_incorporation_or_registration' => $mCertificateOfIncorporationOrRegistration,
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
        $item = DealerRegistration::with('profile')->find($id);
            // Update
            $item = User::find($item->user_id);
            $item->role_id = null;
            $item->save();
            // Remove
            $path_downloads = config('app.paths.file_download');
            $file_url = public_path($path_downloads.$item->profile->certificate_of_incorporation_or_registration);
        $item->delete();

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


        $mCurrentUser = auth()->user();
        $mCurrentUser->loadMissing('role');

        $term = $fields['search_term'];
        $items = DealerRegistration::with(['user','status','dealershipServices'])->when($mCurrentUser->role?->type_id != 1, fn($q) =>
                $q->where('user_id', $mCurrentUser->id)
            )->where(function($query) use($term){
            $query->where('application_number','LIKE','%'.$term.'%');
            $query->orWhere('date_of_issue','LIKE','%'.$term.'%');
            $query->orWhere('effective_date','LIKE','%'.$term.'%');
            $query->orWhere('expiry_date','LIKE','%'.$term.'%');
            $query->orWhereHas('user', function($q) use ($term) {
                $q->where(function($q) use ($term) {
                    $q->where('name', 'LIKE', '%' . $term . '%');
                    $q->orWhere('email', 'LIKE', '%' . $term . '%');
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
        $cooperative_societies = User::when($mCurrentUser->role_id != 1, function ($query) use ($mCurrentUser) {
            $query->where('user_id', $mCurrentUser->id);
        })->orderBy('name', 'asc')->get();
        $mDealersIDs = UserDealershipService::where('category_id', 13)->pluck('user_id');//Grower
        $cooperative_societies = User::where('role_id', 34)->whereIn('id', $mDealersIDs)->orderBy('name', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'users' => $users,
                'user_statuses' => $user_statuses,
                'dealership_categories' => $dealership_categories,
                'cooperative_societies' => $cooperative_societies,
            ]
        ];
        return response($response, 200);
    }




    /**
     * generateCertificatePdf
     */
    public function generateCertificatePdf($id)
    {
        $item = DealerRegistration::with(['user.profile','dealershipServices'])->find($id);
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
        $item = DealerRegistration::find($id);
        if($item){
            return "Certificate is valid";
        }else{
            return "Certificate is invalid";
        }
    }

}
