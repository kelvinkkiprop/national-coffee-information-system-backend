<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
// import
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
// Add
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use App\Models\User;
use App\Models\Settings\Profile;
// use App\Models\Others\Country;
use App\Models\Others\County;
use App\Models\Others\SubCounty;
use App\Models\Others\Ward;
use Log;

class ImportRegisteredFarmer implements ToModel,WithStartRow,WithChunkReading,WithBatchInserts
{

    /**
    * startRow
    */
    public function startRow(): int
    {
        return 2; // Skip_first_row
    }

    /**
    * chunk_and_batch_due_to_large_records
    */
    public function chunkSize(): int
    {
        return 200;
    }

    public function batchSize(): int
    {
        return 200;
    }


    /**
    * Optimize geographical lookups i.e. query County,
    * SubCounty, Ward once instead and reuse for every farmer
    */
    private $mCounties;
    private $mSubCounties;
    private $mWards;

    public function __construct()
    {
        $this->mCounties = County::all();
        $this->mSubCounties = SubCounty::all();
        $this->mWards = Ward::all();
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


        $mName = trim($row[13] ?? '');
        $names = (strtoupper($mName) === 'n/a' || empty($mName)) ? [] : preg_split('/\s+/', $mName);
        $firstName = $names[0] ?? null;
        $middleName = count($names) > 2 ? implode(' ', array_slice($names, 1, -1)) : null;
        $lastName = count($names) > 1 ? end($names) : null;

        $item = User::updateOrCreate(['id'=>$row[300]],[//UUID
            'id' => $row[300],
            'id_number' => $row[1],
            'name' => $mName,
            'first_name'  => $firstName,
            'middle_name' => $middleName,
            'last_name'   => $lastName,
            'phone' => $row[15],
            'email' => $row[18]!='n/a' ? $row[18] : $row[1].'@email.com',
            'role_id' => 34,
            'verification_code' => rand(100000, 999999),
            'remember_token' => Str::random(50),
            'password' => Hash::make($row[14]),
        ]);

        Log::alert("row ".$row[6]);

        // $mCountyName = $row[6];
        // $mCounty = $this->mCounties->where('name','LIKE','%'.$mCountyName.'%')->first(); //County,i.e.,Kiambu;
        // $mSubCountyName = $row[7];
        // $mSubCounty = $this->mSubCounties->where('county_id',$mCounty->id)->where('name','LIKE','%'.$mSubCountyName.'%')->first();
        // $mWardName = $row[9];
        // Profile::updateOrCreate(['user_id'=>$item->id],[
        //     'country_id' => 110, //Kenya
        //     'region_id' => $mCounty->region_id,
        //     'county_id' => $mCounty->id,
        //     'sub_county_id' => $mSubCounty->id,
        //     'ward_id' =>  $this->mWard::where('sub_county_id',$mSubCounty->id)->where('name','LIKE','%'.$mWardName.'%')->first(),
        // ]);

        return null;

    }
}
