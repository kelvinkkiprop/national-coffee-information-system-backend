<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
// import
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithColumnLimit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;
// Add
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use App\Models\User;
use App\Models\Settings\Profile;
// use App\Models\Others\Country;
use App\Models\Others\County;
use App\Models\Others\SubCounty;
use App\Models\Others\Ward;
// use Log;

// class ImportRegisteredFarmer implements ToModel,WithStartRow,WithChunkReading,WithBatchInserts
class ImportRegisteredFarmer implements ToModel,WithStartRow,WithChunkReading,WithBatchInserts,WithColumnLimit,WithSkipDuplicates,ShouldQueue
{

    /**
    * startRow
    */
    public function startRow(): int
    {
        return 2; // Skip_first_row
    }

    /**
    * endColumn
    */
    public function endColumn(): string
    {
        return 'U';
    }

    /**
    * chunk_and_batch_due_to_large_records
    */
    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }



    /**
    * Optimize geographical lookups i.e. query County,
    * SubCounty, Ward once instead and reuse for every farmer
    */
    private $mCounties;
    private $mSubCounties;
    private $mWards;
    private $mRandomPassword;

    public function __construct()
    {
        // $this->mCounties = County::all();
        // $this->mSubCounties = SubCounty::all();
        // $this->mWards = Ward::all();
        $this->mRandomPassword = Hash::make('NCIS@123');
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row): Model|null
    {
        // return new User([
        //     //
        // ]);

        // $mName = trim($row[4] ?? '');
        // $mIDNumber = trim($row[5] ?? '');
        // $mUUID = trim($row[12] ?? '');
        // $mEmail = ($mIDNumber!=='') ? $mIDNumber.'@email.com' : $mUUID.'@email.com';

        // if ($mName!=='' && $mUUID!=='') {
        //     $item = User::updateOrCreate([
        //         'id'=>$row[12],
        //         'id_number'=>$mIDNumber,
        //     ],[//UUID
        //         'id' => $row[12],
        //         'id_number' => $mIDNumber,
        //         'name' => $mName,
        //         'phone' => $row[6],
        //         'email' => $mEmail,
        //         'role_id' => 11, //Farmer
        //         'password' => $mRandomPassword,
        //     ]);
        // }

        $mName = trim($row[4] ?? '');
        $mIDNumber = trim($row[5] ?? '');
        $mUUID = trim($row[12] ?? '');

        // Skip_invalids
        if($mName==='' || $mUUID==='') {
            return null;
        }
        $mEmail=$mIDNumber!=='' ? $mIDNumber.'@email.com' : $mUUID.'@email.com';

        // // Handle_missing_records_gracefully_to_avoid_breaking_the_import
        $mCountyName = trim($row[0] ?? '');
        // $mCounty = !empty($mCountyName) ? $this->mCounties->where('name', 'LIKE', '%'.$mCountyName.'%')->first() : null;
        // $mCounty ??= $this->mCounties->latest()->first(); // If_null_get_most_recent_county

        $mSubCountyName = trim($row[1] ?? '');
        // $mSubCounty = !empty($mSubCountyName) && $mCounty ? $this->mSubCounties->where('county_id', $mCounty->id)->where('name', 'LIKE', '%'.$mSubCountyName.'%')->first() : null;
        // $mSubCounty ??= $this->mSubCounties->where('county_id', $mCounty?->id)->latest()->first(); // Fallback_to_most_recent_sub-county_of_selected_county

        $mWardName = trim($row[2] ?? '');
        // $mWard = !empty($mWardName) && $mSubCounty ? $this->mWard::where('sub_county_id', $mSubCounty->id)->where('name', 'LIKE', '%'.$mWardName.'%') ->first() : null;
        // $mWard ??= $this->mWard::where('sub_county_id', $mSubCounty?->id)->latest()->first(); //Fallback_to_most_recent_ward_belonging_to_selected_subcounty

        return new User([
            'id' => $mUUID,
            'id_number' => $mIDNumber ?: null,
            'name' => $mName,
            'phone' => $row[6] ?? null,
            'gender_id' => !empty($row[7]) ? (strtolower(trim($row[7])) === 'male' ? 1 : 2) : null,
            'email' => $mEmail,
            'role_id' => 11,
            'password' => $this->mRandomPassword,

            // Also
            'country_id' => 110, //Kenya
            // 'region_id' => $mCounty?->region_id,
            // 'county_id' => $mCounty?->id,
            // 'sub_county_id' => $mSubCounty?->id,
            // 'ward_id' =>  $mWard?->id,

            'county_name' =>  $mCountyName,
            'sub_county_name' =>  $mCountyName,
            'ward_name' =>  $mWardName,
            'grower_type_id' => !empty($row[3]) ? (strtolower(trim($row[3])) === 'society' ? 1 : 2) : null,
            'society_name' =>  $row[8],
            'factory' =>  $row[9],
            'grower_code' => $row[10],
            'estate_name' => $row[13],
            'estate_code' => $row[20],
        ]);


    }
}
