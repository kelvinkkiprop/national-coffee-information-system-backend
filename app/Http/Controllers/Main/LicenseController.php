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
use App\Models\Settings\IssuingBody;
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
        if($mCurrentUser->role?->type_id==1){
            return License::with(['user','type','issuingBody','category','status','payment.status'])->orderBy('created_at', 'desc')->paginate(10);
        }else{
            return License::with(['user','type','issuingBody','category','status','payment.status'])->where('user_id', $mCurrentUser->id)->orderBy('created_at', 'desc')->paginate(10);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'category_id' => 'required|integer',
            'issuing_body_id' => 'required|integer',
            'type_id' => 'required|integer',
            'financial_year' => 'required|string',
            'expiry_date' => 'required|date',
            // 1.AgentLicense
            'paid_share_capital' => 'nullable|required_if:type_id,1|nullable|string',
            'directors_details' => 'nullable|required_if:type_id,1|file|mimes:pdf|max:40960',
            'years_of_technical_experience' => 'nullable|required_if:type_id,1|file|mimes:pdf|max:40960',
            'growers_represented_and_signed_agreements' => 'nullable|required_if:type_id,1|file|mimes:pdf|max:40960',
            'indemnity_against_professional_misconduct' => 'nullable|required_if:type_id,1|file|mimes:pdf|max:40960',
            'liquorer_cupping_facility_engaged' => 'nullable|string',
            // 2.BuyerLicense
            'license_purpose' => 'nullable|required_if:type_id,2|string',
            // 3.WarehouseOperatorLicense
            'directors_name_address_and_occupations' => 'nullable|required_if:type_id,3|string',
            // 4.LiquoringLicense
            'year_of_certification' => 'nullable|required_if:type_id,4|string',
            'current_occupation' => 'nullable|required_if:type_id,4|string',
            'coffee_tasting_expert_certificate' => 'nullable|required_if:type_id,4|file|mimes:pdf|max:40960',
            // 5.CommercialMillersLicence
            'milling_capacity' => 'nullable|required_if:type_id,5|string',
            'comprehensive_insurance_policy' => 'nullable|file|mimes:pdf|max:40960',
            'mill_certification' => 'nullable|file|mimes:pdf|max:40960',
            // 6.IndependentCuppingLabsLicence
            'company_officials' => 'nullable|file|mimes:pdf|max:40960',
            'licensed_liquorers_engaged' => 'nullable|required_if:type_id,6|string',
            'laboratory_facilities' => 'nullable|required_if:type_id,6|string',
            'services_to_be_offered' => 'nullable|required_if:type_id,6|string',
            'statutory_compliance' => 'nullable|required_if:type_id,6|file|mimes:pdf|max:40960',
            // Other
            'self_declaration_form' => 'nullable|required_if:type_id,1,6|file|mimes:pdf|max:40960',
            'commitment_declaration' => 'required|string',
        ]);

        $path_uploads = config('app.paths.file_upload');
        $mDirectorsDetails=null;
        if ($request->hasFile('directors_details')){
            $mDirectorsDetails = time().uniqid().'.'.$request->directors_details->extension();
            $request->directors_details->storeAs($path_uploads, $mDirectorsDetails, 'public');
        }
        $mYearsOfTechnicalExperience=null;
        if ($request->hasFile('years_of_technical_experience')){
            $mYearsOfTechnicalExperience = time().uniqid().'.'.$request->years_of_technical_experience->extension();
            $request->years_of_technical_experience->storeAs($path_uploads, $mYearsOfTechnicalExperience, 'public');
        }
        $mGrowersRepresentedAndSignedAgreements=null;
        if ($request->hasFile('growers_represented_and_signed_agreements')){
            $mGrowersRepresentedAndSignedAgreements = time().uniqid().'.'.$request->growers_represented_and_signed_agreements->extension();
            $request->growers_represented_and_signed_agreements->storeAs($path_uploads, $mGrowersRepresentedAndSignedAgreements, 'public');
        }
        $mIndemnityAgainstProfessionalMisconduct=null;
        if ($request->hasFile('indemnity_against_professional_misconduct')){
            $mIndemnityAgainstProfessionalMisconduct = time().uniqid().'.'.$request->indemnity_against_professional_misconduct->extension();
            $request->indemnity_against_professional_misconduct->storeAs($path_uploads, $mIndemnityAgainstProfessionalMisconduct, 'public');
        }
        $mCoffeeTastingExpertCertificate=null;
        if ($request->hasFile('coffee_tasting_expert_certificate')){
            $mCoffeeTastingExpertCertificate = time().uniqid().'.'.$request->coffee_tasting_expert_certificate->extension();
            $request->coffee_tasting_expert_certificate->storeAs($path_uploads, $mCoffeeTastingExpertCertificate, 'public');
        }
        $mComprehensiveInsurancePolicy=null;
        if ($request->hasFile('comprehensive_insurance_policy')){
            $mComprehensiveInsurancePolicy = time().uniqid().'.'.$request->comprehensive_insurance_policy->extension();
            $request->comprehensive_insurance_policy->storeAs($path_uploads, $mComprehensiveInsurancePolicy, 'public');
        }
        $mMillCertification=null;
        if ($request->hasFile('mill_certification')){
            $mMillCertification = time().uniqid().'.'.$request->mill_certification->extension();
            $request->mill_certification->storeAs($path_uploads, $mMillCertification, 'public');
        }
        $mCompanyOfficials=null;
        if ($request->hasFile('company_officials')){
            $mCompanyOfficials = time().uniqid().'.'.$request->company_officials->extension();
            $request->company_officials->storeAs($path_uploads, $mCompanyOfficials, 'public');
        }
        $mStatutoryCompliance=null;
        if ($request->hasFile('statutory_compliance')){
            $mStatutoryCompliance = time().uniqid().'.'.$request->statutory_compliance->extension();
            $request->statutory_compliance->storeAs($path_uploads, $mStatutoryCompliance, 'public');
        }
        $mSelfDeclarationForm=null;
        if ($request->hasFile('self_declaration_form')){
            $mSelfDeclarationForm = time().uniqid().'.'.$request->self_declaration_form->extension();
            $request->self_declaration_form->storeAs($path_uploads, $mSelfDeclarationForm, 'public');
        }


        $mIssuingBody = IssuingBody::find($fields['issuing_body_id']);
        if($mIssuingBody->id !=1 ){
            $response = [
                'status' => 'failed',
                'message' => 'This license type is currently unavailable.',
            ];
            return response($response, 200);
        }

        // WithSoftDelete
        $nextNumber = License::withTrashed()->count()+1;
        $mType = LicenseType::find($fields['type_id']);
        $mApplicationNumber = $mIssuingBody->alias.'/'.$mType->index_number_prefix.'/'.date('Y').'/'.$nextNumber;
        $paymentId = (string)Str::uuid();
        $mCurrentUser= auth()->user();
        $item = License::create([
            'user_id' => $mCurrentUser->id,
            'application_number' => $mApplicationNumber,
            'category_id' => $fields['category_id'],
            'issuing_body_id' => $fields['issuing_body_id'],
            'type_id' => $fields['type_id'],
            'financial_year' => $fields['financial_year'],
            'expiry_date' => $fields['expiry_date'],
            // 1.AgentLicense
            'paid_share_capital' => $fields['paid_share_capital'],
            'directors_details' => $mDirectorsDetails,
            'years_of_technical_experience' => $mYearsOfTechnicalExperience,
            'growers_represented_and_signed_agreements' => $mGrowersRepresentedAndSignedAgreements,
            'indemnity_against_professional_misconduct' => $mIndemnityAgainstProfessionalMisconduct,
            'liquorer_cupping_facility_engaged' => $fields['liquorer_cupping_facility_engaged'],
            // 2.BuyerLicense
            'license_purpose' => $fields['license_purpose'],
            // 3.WarehouseOperatorLicense
            'directors_name_address_and_occupations' => $fields['directors_name_address_and_occupations'],
            // 4.LiquoringLicense
            'year_of_certification' => $fields['year_of_certification'],
            'current_occupation' => $fields['current_occupation'],
            'coffee_tasting_expert_certificate' => $mCoffeeTastingExpertCertificate,
            // 5.CommercialMillersLicence
            'milling_capacity' => $fields['milling_capacity'],
            'comprehensive_insurance_policy' => $mComprehensiveInsurancePolicy,
            'mill_certification' => $mMillCertification,
            // 6.IndependentCuppingLabsLicence
            'company_officials' => $mCompanyOfficials,
            'licensed_liquorers_engaged' => $fields['licensed_liquorers_engaged'],
            'laboratory_facilities' => $fields['laboratory_facilities'],
            'services_to_be_offered' => $fields['services_to_be_offered'],
            'statutory_compliance' => $mStatutoryCompliance,
            // Other
            'self_declaration_form' => $mSelfDeclarationForm,
            'commitment_declaration' => filter_var($fields['commitment_declaration'], FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'payment_id' => $paymentId,
        ]);

        $nextNumber = Payment::withTrashed()->count()+1;
        // $mInvoiceNumber = 'IN/'.date('Y').'/'.$nextNumber;
        $mInvoiceNumber = 'IN//'.date('Y').'//'.$nextNumber;
        $mTariffId = 2;
        $payment = null;
        // $payment = Payment::updateOrCreate(['id' => $paymentId],[
        //     'id' => $paymentId,
        //     'invoice_number' => $mInvoiceNumber,
        //     'user_id' => $mCurrentUser->id,
        //     'amount' => Tariff::find($mTariffId)->amount,
        //     'format' => 'json',
        //     'service_id' => 2,
        //     'tariff_id' => $mTariffId,
        // ]);

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
        return License::with(['user','type','issuingBody','category','status','payment.status'])->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'category_id' => 'required|integer',
            'issuing_body_id' => 'required|integer',
            'type_id' => 'required|integer',
            'financial_year' => 'required|string',
            'expiry_date' => 'required|date',
            // 1.AgentLicense
            'paid_share_capital' => 'nullable|required_if:type_id,1|nullable|string',
            'directors_details' => 'nullable|required_if:type_id,1|file|mimes:pdf|max:40960',
            'years_of_technical_experience' => 'nullable|required_if:type_id,1|file|mimes:pdf|max:40960',
            'growers_represented_and_signed_agreements' => 'nullable|required_if:type_id,1|file|mimes:pdf|max:40960',
            'indemnity_against_professional_misconduct' => 'nullable|required_if:type_id,1|file|mimes:pdf|max:40960',
            'liquorer_cupping_facility_engaged' => 'nullable|string',
            // 2.BuyerLicense
            'license_purpose' => 'nullable|required_if:type_id,2|string',
            // 3.WarehouseOperatorLicense
            'directors_name_address_and_occupations' => 'nullable|required_if:type_id,3|string',
            // 4.LiquoringLicense
            'year_of_certification' => 'nullable|required_if:type_id,4|string',
            'current_occupation' => 'nullable|required_if:type_id,4|string',
            'coffee_tasting_expert_certificate' => 'nullable|required_if:type_id,4|file|mimes:pdf|max:40960',
            // 5.CommercialMillersLicence
            'milling_capacity' => 'nullable|required_if:type_id,5|string',
            'comprehensive_insurance_policy' => 'nullable|file|mimes:pdf|max:40960',
            'mill_certification' => 'nullable|file|mimes:pdf|max:40960',
            // 6.IndependentCuppingLabsLicence
            'company_officials' => 'nullable|file|mimes:pdf|max:40960',
            'licensed_liquorers_engaged' => 'nullable|required_if:type_id,6|string',
            'laboratory_facilities' => 'nullable|required_if:type_id,6|string',
            'services_to_be_offered' => 'nullable|required_if:type_id,6|string',
            'statutory_compliance' => 'nullable|required_if:type_id,6|file|mimes:pdf|max:40960',
            // Other
            'self_declaration_form' => 'nullable|required_if:type_id,1,6|file|mimes:pdf|max:40960',
            'commitment_declaration' => 'required|string',
        ]);

        // DeleteOld
        $path_downloads = config('app.paths.file_download');
        $item = License::find($id);
        $file_url = public_path($path_downloads.$item->directors_details);
        if(File::exists($file_url)){File::delete($file_url);}
        $file_url = public_path($path_downloads.$item->years_of_technical_experience);
        if(File::exists($file_url)){File::delete($file_url);}
        $file_url = public_path($path_downloads.$item->growers_represented_and_signed_agreements);
        if(File::exists($file_url)){File::delete($file_url);}
        $file_url = public_path($path_downloads.$item->indemnity_against_professional_misconduct);
        if(File::exists($file_url)){File::delete($file_url);}
        $file_url = public_path($path_downloads.$item->coffee_tasting_expert_certificate);
        if(File::exists($file_url)){File::delete($file_url);}
        $file_url = public_path($path_downloads.$item->comprehensive_insurance_policy);
        if(File::exists($file_url)){File::delete($file_url);}
        $file_url = public_path($path_downloads.$item->mill_certification);
        if(File::exists($file_url)){File::delete($file_url);}
        $file_url = public_path($path_downloads.$item->company_officials);
        if(File::exists($file_url)){File::delete($file_url);}
        $file_url = public_path($path_downloads.$item->statutory_compliance);
        if(File::exists($file_url)){File::delete($file_url);}
        $file_url = public_path($path_downloads.$item->self_declaration_form);
        if(File::exists($file_url)){File::delete($file_url);}

        $path_uploads = config('app.paths.file_upload');
        $mDirectorsDetails=null;
        if ($request->hasFile('directors_details')){
            $mDirectorsDetails = time().uniqid().'.'.$request->directors_details->extension();
            $request->directors_details->storeAs($path_uploads, $mDirectorsDetails, 'public');
        }
        $mYearsOfTechnicalExperience=null;
        if ($request->hasFile('years_of_technical_experience')){
            $mYearsOfTechnicalExperience = time().uniqid().'.'.$request->years_of_technical_experience->extension();
            $request->years_of_technical_experience->storeAs($path_uploads, $mYearsOfTechnicalExperience, 'public');
        }
        $mGrowersRepresentedAndSignedAgreements=null;
        if ($request->hasFile('growers_represented_and_signed_agreements')){
            $mGrowersRepresentedAndSignedAgreements = time().uniqid().'.'.$request->growers_represented_and_signed_agreements->extension();
            $request->growers_represented_and_signed_agreements->storeAs($path_uploads, $mGrowersRepresentedAndSignedAgreements, 'public');
        }
        $mIndemnityAgainstProfessionalMisconduct=null;
        if ($request->hasFile('indemnity_against_professional_misconduct')){
            $mIndemnityAgainstProfessionalMisconduct = time().uniqid().'.'.$request->indemnity_against_professional_misconduct->extension();
            $request->indemnity_against_professional_misconduct->storeAs($path_uploads, $mIndemnityAgainstProfessionalMisconduct, 'public');
        }
        $mCoffeeTastingExpertCertificate=null;
        if ($request->hasFile('coffee_tasting_expert_certificate')){
            $mCoffeeTastingExpertCertificate = time().uniqid().'.'.$request->coffee_tasting_expert_certificate->extension();
            $request->coffee_tasting_expert_certificate->storeAs($path_uploads, $mCoffeeTastingExpertCertificate, 'public');
        }
        $mComprehensiveInsurancePolicy=null;
        if ($request->hasFile('comprehensive_insurance_policy')){
            $mComprehensiveInsurancePolicy = time().uniqid().'.'.$request->comprehensive_insurance_policy->extension();
            $request->comprehensive_insurance_policy->storeAs($path_uploads, $mComprehensiveInsurancePolicy, 'public');
        }
        $mMillCertification=null;
        if ($request->hasFile('mill_certification')){
            $mMillCertification = time().uniqid().'.'.$request->mill_certification->extension();
            $request->mill_certification->storeAs($path_uploads, $mMillCertification, 'public');
        }
        $mCompanyOfficials=null;
        if ($request->hasFile('company_officials')){
            $mCompanyOfficials = time().uniqid().'.'.$request->company_officials->extension();
            $request->company_officials->storeAs($path_uploads, $mCompanyOfficials, 'public');
        }
        $mStatutoryCompliance=null;
        if ($request->hasFile('statutory_compliance')){
            $mStatutoryCompliance = time().uniqid().'.'.$request->statutory_compliance->extension();
            $request->statutory_compliance->storeAs($path_uploads, $mStatutoryCompliance, 'public');
        }
        $mSelfDeclarationForm=null;
        if ($request->hasFile('self_declaration_form')){
            $mSelfDeclarationForm = time().uniqid().'.'.$request->self_declaration_form->extension();
            $request->self_declaration_form->storeAs($path_uploads, $mSelfDeclarationForm, 'public');
        }

        $mCurrentUser= auth()->user();
        $item = License::where('id', $id)->update([
            'user_id' => $mCurrentUser->id,
            // 'application_number' => $mApplicationNumber,
            'category_id' => $fields['category_id'],
            'issuing_body_id' => $fields['issuing_body_id'],
            'type_id' => $fields['type_id'],
            'financial_year' => $fields['financial_year'],
            'expiry_date' => $fields['expiry_date'],
            // 1.AgentLicense
            'paid_share_capital' => $fields['paid_share_capital'],
            'directors_details' => $mDirectorsDetails,
            'years_of_technical_experience' => $mYearsOfTechnicalExperience,
            'growers_represented_and_signed_agreements' => $mGrowersRepresentedAndSignedAgreements,
            'indemnity_against_professional_misconduct' => $mIndemnityAgainstProfessionalMisconduct,
            'liquorer_cupping_facility_engaged' => $fields['liquorer_cupping_facility_engaged'],
            // 2.BuyerLicense
            'license_purpose' => $fields['license_purpose'],
            // 3.WarehouseOperatorLicense
            'directors_name_address_and_occupations' => $fields['directors_name_address_and_occupations'],
            // 4.LiquoringLicense
            'year_of_certification' => $fields['year_of_certification'],
            'current_occupation' => $fields['current_occupation'],
            'coffee_tasting_expert_certificate' => $mCoffeeTastingExpertCertificate,
            // 5.CommercialMillersLicence
            'milling_capacity' => $fields['milling_capacity'],
            'comprehensive_insurance_policy' => $mComprehensiveInsurancePolicy,
            'mill_certification' => $mMillCertification,
            // 6.IndependentCuppingLabsLicence
            'company_officials' => $mCompanyOfficials,
            'licensed_liquorers_engaged' => $fields['licensed_liquorers_engaged'],
            'laboratory_facilities' => $fields['laboratory_facilities'],
            'services_to_be_offered' => $fields['services_to_be_offered'],
            'statutory_compliance' => $mStatutoryCompliance,
            // Other
            'self_declaration_form' => $mSelfDeclarationForm,
            'commitment_declaration' => filter_var($fields['commitment_declaration'], FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'status_id' => 3,//UnderReview
        ]);

        $mCurrentUser= auth()->user();
        $item = License::find($id);
        $mTariffId = 2;
        $payment = null;
        // $payment = Payment::updateOrCreate(['id' => $item->payment_id],[
        //     'user_id' => $mCurrentUser->id,
        //     'amount' => Tariff::find($mTariffId)->amount,
        //     'format' => 'json',
        //     'service_id' => 2,
        //     'tariff_id' => $mTariffId,
        // ]);

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
            $file_url = public_path($path_downloads.$item->directors_details);
            if(File::exists($file_url)){File::delete($file_url);}
            $file_url = public_path($path_downloads.$item->years_of_technical_experience);
            if(File::exists($file_url)){File::delete($file_url);}
            $file_url = public_path($path_downloads.$item->growers_represented_and_signed_agreements);
            if(File::exists($file_url)){File::delete($file_url);}
            $file_url = public_path($path_downloads.$item->indemnity_against_professional_misconduct);
            if(File::exists($file_url)){File::delete($file_url);}
            $file_url = public_path($path_downloads.$item->coffee_tasting_expert_certificate);
            if(File::exists($file_url)){File::delete($file_url);}
            $file_url = public_path($path_downloads.$item->comprehensive_insurance_policy);
            if(File::exists($file_url)){File::delete($file_url);}
            $file_url = public_path($path_downloads.$item->mill_certification);
            if(File::exists($file_url)){File::delete($file_url);}
            $file_url = public_path($path_downloads.$item->company_officials);
            if(File::exists($file_url)){File::delete($file_url);}
            $file_url = public_path($path_downloads.$item->statutory_compliance);
            if(File::exists($file_url)){File::delete($file_url);}
            $file_url = public_path($path_downloads.$item->self_declaration_form);
            if(File::exists($file_url)){File::delete($file_url);}
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
        if($mCurrentUser->role?->type_id==1){
            $items = License::with(['user','type','issuingBody','category','status','payment.status'])->where('user_id', $mCurrentUser->id)->where(function($query) use($term){
                $query->where('application_number','LIKE','%'.$term.'%');
                $query->orWhere('financial_year','LIKE','%'.$term.'%');
                $query->orWhere('expiry_date','LIKE','%'.$term.'%');
                $query->orWhereHas('user', function($q) use ($term) {
                    $q->where(function($q) use ($term) {
                        $q->where('name', 'LIKE', '%' . $term . '%');
                        $q->orWhere('email', 'LIKE', '%' . $term . '%');
                    });
                });
                $query->orWhereHas('category', function($q) use ($term) {
                    $q->where(function($q) use ($term) {
                        $q->where('name', 'LIKE', '%' . $term . '%');
                        $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                    });
                });
                $query->orWhereHas('issuingBody', function($q) use ($term) {
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
            })->orderBy('created_at', 'desc')->get();
         }else{
            $items = License::with(['user','type','issuingBody','category','status','payment.status'])->where(function($query) use($term){
                $query->where('application_number','LIKE','%'.$term.'%');
                $query->orWhere('financial_year','LIKE','%'.$term.'%');
                $query->orWhere('expiry_date','LIKE','%'.$term.'%');
                $query->orWhereHas('user', function($q) use ($term) {
                    $q->where(function($q) use ($term) {
                        $q->where('name', 'LIKE', '%' . $term . '%');
                        $q->orWhere('email', 'LIKE', '%' . $term . '%');
                    });
                });
                $query->orWhereHas('category', function($q) use ($term) {
                    $q->where(function($q) use ($term) {
                        $q->where('name', 'LIKE', '%' . $term . '%');
                        $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                    });
                });
                $query->orWhereHas('issuingBody', function($q) use ($term) {
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
            })->where('user_id', $mCurrentUser->id)->orderBy('created_at', 'desc')->get();         }

        $response = [
            'status' => 'success',
            'message' => 'Licenses search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $issuing_bodies = IssuingBody::orderBy('id', 'asc')->get();
        $license_types = LicenseType::orderBy('id', 'asc')->get();
        $license_categories = LicenseCategory::orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'issuing_bodies' => $issuing_bodies,
                'license_types' => $license_types,
                'license_categories' => $license_categories,
            ]
        ];
        return response($response, 200);
    }



    /**
     * filterLicenseTypes
     */
    public function filterLicenseTypes($issuing_body_id)
    {
        return LicenseType::where('issuing_body_id', $issuing_body_id)->orderBy('name', 'asc')->get();
    }

    /**
     * generateLicensePdf
     */
    public function generateLicensePdf($id)
    {
        $item = License::with(['user','type','issuingBody','category','status'])->find($id);
        // return $item;
        // return view('prints.licenses.coffee-buyer-license-pd')->with('item', $item);

        $verificationUrl = url(config('app.asset_url').'/api/verify-license/' . $item->id);
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->margin(1)->generate($verificationUrl));
        $datePrinted = Carbon::now();
        $data = [
            'title' => $item->application_number,
            'item' => $item,
            'qr_code' => $qrCode,
            'date_printed' => $datePrinted,
        ];
        // return $data;
        if($item->type_id==1){//CoffeeAgent
            $dompdf = PDF::loadView('prints.licenses.coffee-agent-license-pdf', $data)->setPaper('a4', 'potrait');
        }elseif($item->type_id==2){//CoffeeBuyer
            $dompdf = PDF::loadView('prints.licenses.coffee-buyer-license-pdf', $data)->setPaper('a4', 'potrait');
        }elseif($item->type_id==3){//WarehouseOperator
            $dompdf = PDF::loadView('prints.licenses.coffee-warehouse-operator-license-pdf', $data)->setPaper('a4', 'potrait');
        }elseif($item->type_id==4){//CoffeeLiquor
            $dompdf = PDF::loadView('prints.licenses.coffee-liquoring-license-pdf', $data)->setPaper('a4', 'potrait');
        }elseif($item->type_id==5){//CoffeeCommercialMillers
            $dompdf = PDF::loadView('prints.licenses.coffee-commercial-milling-license-pdf', $data)->setPaper('a4', 'potrait');
        }elseif($item->type_id==6){//IndependentCuppingLab
            $dompdf = PDF::loadView('prints.licenses.independent-cupping-lab-license-pdf', $data)->setPaper('a4', 'potrait');
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
