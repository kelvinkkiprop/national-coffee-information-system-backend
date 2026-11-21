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
class ImportRegisteredFarmer implements ToModel,WithStartRow,WithChunkReading,WithColumnLimit,ShouldQueue
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
        return 500;
    }

    public function batchSize(): int
    {
        return 500;
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

        // Skip invalid records
        if ($mName === '' || $mUUID === '') {
            return null;
        }
        $mEmail = $mIDNumber !== '' ? $mIDNumber.'@email.com' : $mUUID.'@email.com';
        // Skip_duplicates
        $mExists = User::where('id',$mUUID)->orWhere('email', $mEmail)->when($mIDNumber!=='', fn($q)=>$q->orWhere('id_number', $mIDNumber))->exists();

        if($mExists){
            return null;
        }

        $mCountyName = $row[6];
        $mCounty = $this->mCounties->where('name','LIKE','%'.$mCountyName.'%')->first(); //County,i.e.,Kiambu;
        $mSubCountyName = $row[7];
        $mSubCounty = $this->mSubCounties->where('county_id',$mCounty->id)->where('name','LIKE','%'.$mSubCountyName.'%')->first();
        $mWardName = $row[9];
        return new User([
            'id' => $mUUID,
            'id_number' => $mIDNumber ?: null,
            'name' => $mName,
            'phone' => $row[6] ?? null,
            'email' => $mEmail,
            'role_id' => 11,
            'password' => $this->mRandomPassword,

            // Also
            'country_id' => 110, //Kenya
            'region_id' => $mCounty->region_id,
            'county_id' => $mCounty->id,
            'sub_county_id' => $mSubCounty->id,
            'ward_id' =>  $this->mWard::where('sub_county_id',$mSubCounty->id)->where('name','LIKE','%'.$mWardName.'%')->first(),
        ]);


    }
}
