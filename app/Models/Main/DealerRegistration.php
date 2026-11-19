<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
// Add
use App\Models\User;
use App\Models\Others\DealerRegistrationStatus;

class DealerRegistration extends Model
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
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'application_number',

        // Common
        'certificate_of_incorporation_or_registration',
        'directors_details_id_passport_and_kra_pins',
        'tax_compliance_certificate',
         // 2_Grower
         'cooperative_society_id',
        // 16_Coffee_Training_School
        'premises_ownership_or_lease_document',
        'training_equipment_inventory',
        'course_outline_and_training_curriculum',
        'names_qualifications_and_certificates_of_trainers',
        'education_or_training_accreditation_certificate',
        'public_health_certificate',
        // 17_Event_Organisers
        'company_profile',
        // 18_Coffee_Projects
        'project_document',
        'county_government_support_letters_and_mou',
        'implementation_plan_monitoring_and_evaluation_framework',

        'created_at',
        'updated_at',

        'status_id',
        'expiry_date',
    ];



    /**
    * appends
    */
    protected $appends = [
        // Common
        'certificate_of_incorporation_or_registration_url',
        'directors_details_id_passport_and_kra_pins_url',
        'tax_compliance_certificate_url',
        // 16_Coffee_Training_School
        'premises_ownership_or_lease_document_url',
        'training_equipment_inventory_url',
        'course_outline_and_training_curriculum_url',
        'names_qualifications_and_certificates_of_trainers_url',
        'education_or_training_accreditation_certificate_url',
        'public_health_certificate_url',
        // 17_Event_Organisers
        'company_profile_url',
        // 18_Coffee_Projects
        'project_document_url',
        'county_government_support_letters_and_mou_url',
        'implementation_plan_monitoring_and_evaluation_framework_url',
    ];


    /**
    * getters_and_setters
    */
    public function getCertificateOfIncorporationOrRegistrationUrlAttribute()
    {
        $value = $this->certificate_of_incorporation_or_registration;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getDirectorsDetailsIdPassportAndKraPinsUrlAttribute()
    {
        $value = $this->directors_details_id_passport_and_kra_pins;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getTaxComplianceCertificateUrlAttribute()
    {
        $value = $this->tax_compliance_certificate;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getPremisesOwnershipOrLeaseDocumentUrlAttribute()
    {
        $value = $this->premises_ownership_or_lease_document;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getTrainingEquipmentInventoryUrlAttribute()
    {
        $value = $this->training_equipment_inventory;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getCourseOutlineAndTrainingCurriculumUrlAttribute()
    {
        $value = $this->course_outline_and_training_curriculum;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getNamesQualificationsAndCertificatesOfTrainersUrlAttribute()
    {
        $value = $this->names_qualifications_and_certificates_of_trainers;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getEducationOrTrainingAccreditationCertificateUrlAttribute()
    {
        $value = $this->education_or_training_accreditation_certificate;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getPublicHealthCertificateUrlAttribute()
    {
        $value = $this->public_health_certificate;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getCompanyProfileUrlAttribute()
    {
        $value = $this->company_profile;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getProjectDocumentUrlAttribute()
    {
        $value = $this->project_document;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getCountyGovernmentSupportLettersAndMouUrlAttribute()
    {
        $value = $this->county_government_support_letters_and_mou;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }
    public function getImplementationPlanMonitoringAndEvaluationFrameworkUrlAttribute()
    {
        $value = $this->implementation_plan_monitoring_and_evaluation_framework;
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
     * dealershipServices
     */
    public function dealershipServices(){
        return $this->hasMany(UserDealershipService::class, 'dealer_registration_id', 'id');
    }

    /**
     * status
     */
    public function status(){
        return $this->hasOne(DealerRegistrationStatus::class, 'id', 'status_id');
    }

}
