<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
// Add
use App\Models\User;
use App\Models\Main\Payment;
use App\Models\Settings\IssuingBody;
use App\Models\Settings\LicenseType;
use App\Models\Settings\LicenseCategory;
use App\Models\Others\LicenseStatus;
use App\Models\Others\PaymentStatus;

class License extends Model
{
    use HasUuids, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = Str::uuid();
            }
        });
    }

    /**
    * The attributes that are mass assignable.
    */
    protected $fillable = [
        'id',
        'user_id',
        'application_number',
        'issuing_body_id',
        'category_id',
        'type_id',
        'financial_year',
        'expiry_date',

        // 1.AgentLicense
        'paid_share_capital',
        'directors_details',
        'years_of_technical_experience',
        'growers_represented_and_signed_agreements',
        'indemnity_against_professional_misconduct',
        'liquorer_cupping_facility_engaged',
        // 2.BuyerLicense
        'license_purpose',
        // 3.WarehouseOperatorLicense
        'directors_name_address_and_occupations',
        // 4.LiquoringLicense
        'year_of_certification',
        'current_occupation',
        'coffee_tasting_expert_certificate',
        // 5.CommercialMillersLicence
        'milling_capacity',
        'comprehensive_insurance_policy',
        'mill_certification',
        // 6.IndependentCuppingLabsLicence
        'company_officials',
        'licensed_liquorers_engaged',
        'laboratory_facilities',
        'services_to_be_offered',
        'statutory_compliance',

        'self_declaration_form',
        'commitment_declaration',

        'date_of_gazettement_intent',
        'date_of_issue',
        'effective_date',
        // 'duration',
        'payment_id',
        'payment_status_id',
        'status_id',

        'created_at',
        'updated_at',
    ];


    protected $casts = [
        'commitment_declaration' => 'boolean',
    ];


    /**
    * appends
    */
    protected $appends = [
        'directors_details_url',
        'years_of_technical_experience_url',
        'growers_represented_and_signed_agreements_url',
        'indemnity_against_professional_misconduct_url',
        'coffee_tasting_expert_certificate_url',
        'comprehensive_insurance_policy_url',
        'mill_certification_url',
        'company_officials_url',
        'statutory_compliance_url',
        'self_declaration_form_url',
    ];



    /**
    * getters_and_setters
    */
    public function getDirectorsDetailsUrlAttribute()
    {
        $value = $this->directors_details;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getYearsOfTechnicalExperienceUrlAttribute()
    {
        $value = $this->years_of_technical_experience;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getGrowersRepresentedAndSignedAgreementsUrlAttribute()
    {
        $value = $this->growers_represented_and_signed_agreements;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getIndemnityAgainstProfessionalMisconductUrlAttribute()
    {
        $value = $this->indemnity_against_professional_misconduct;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getCoffeeTastingExpertCertificateUrlAttribute()
    {
        $value = $this->coffee_tasting_expert_certificate;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getComprehensiveInsurancePolicyUrlAttribute()
    {
        $value = $this->comprehensive_insurance_policy;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getMillCertificationUrlAttribute()
    {
        $value = $this->mill_certification;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getCompanyOfficialsUrlAttribute()
    {
        $value = $this->company_officials;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getStatutoryComplianceUrlAttribute()
    {
        $value = $this->statutory_compliance;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getSelfDeclarationFormUrlAttribute()
    {
        $value = $this->self_declaration_form;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }


    /**
     * user
     */
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * issuingBody
     */
    public function issuingBody(){
        return $this->hasOne(IssuingBody::class, 'id', 'issuing_body_id');
    }
    /**
     * type
     */
    public function type(){
        return $this->hasOne(LicenseType::class, 'id', 'type_id');
    }

    /**
     * paymentStatus
     */
    public function paymentStatus(){
        return $this->hasOne(PaymentStatus::class, 'id', 'payment_status_id');
    }

    /**
     * category
     */
    public function category(){
        return $this->hasOne(LicenseCategory::class, 'id', 'category_id');
    }


    /**
     * payment
     */
    public function payment(){
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }

    /**
     * status
     */
    public function status(){
        return $this->hasOne(LicenseStatus::class, 'id', 'status_id');
    }

}
