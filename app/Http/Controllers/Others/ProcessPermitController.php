<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Carbon\Carbon;
use App\Models\User;
use App\Models\Main\Permit;
use App\Models\Others\PermitStatus;
// Notifications
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class ProcessPermitController extends Controller
{

    /**
    * nextPreviousItems
    */
    public function nextPreviousItems(string $id)
    {
        // return PermitStatus::get();
        return PermitStatus::where('id', $id-1)->orwhere('id', $id+1)->get();
    }



    /**
     * reviewApplicationItem
     */
    public function reviewApplicationItem(Request $request, string $id)
    {
        $fields = $request->validate([
            'status_id' => 'required|integer',
            'remarks' => 'string|nullable',
        ]);

        $mStatusId = $fields['status_id'];
        $mRemarks = $fields['remarks'];

        // Notifications
        $item = Permit::find($id);
        Permit::where('id', $id)->update([
            'status_id' => $mStatusId,
            // 'remarks' => $fields['remarks'],
        ]);
        if($mStatusId==2){//Returned
            $fields = $request->validate([
                'remarks' => 'string|nullable',
            ]);
            $mUser = User::find($item->user_id);
            $message = "<div>
                <p>We regret to inform you that your application has been returned.</p>
                <p>
                    <strong>Application Number:</strong> {$item->application_number} <br>
                    <strong>Remarks:</strong> {$mRemarks} <br>
                </p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'Permit Application',
                'url' => config('app.url').'/permits/show/'.$item->id,
                'btn-text' => 'View',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($mUser->email)->send(new AlertMail($data));

        }else if($mStatusId==4){//Review
            $mUsers = User::whereIn('role_id', [5,7])->get(); //Finance/DG
            foreach ($mUsers as $mUser) {
                $message = "<div>
                    <p>You have an new application to act on.</p>
                    <p>
                        <strong>Application Number:</strong> {$item->application_number} <br>
                        <strong>Remarks:</strong> {$mRemarks} <br>
                    </p>
                </div>";
                $data = array(
                    'name' => $mUser->name,
                    'subject' => 'Permit Application',
                    'url' => config('app.url').'/permits/show/'.$item->id,
                    'btn-text' => 'View',
                    'message' => $message,
                    'file' => null,
                    'file_name' => null
                );
                Mail::to($mUser->email)->send(new AlertMail($data));
            }
        }

        $response = [
            'status' => 'success',
            'message' => 'Application status updated successfully',
            'data' => $item
        ];
        return response($response, 201);
    }


    /**
     * approveApplicationItem
     */
    public function approveApplicationItem(Request $request, string $id)
    {
        $fields = $request->validate([
            'status_id' => 'required|string',
            'date_of_issue' => 'required_if:status_id,5|nullable|date',
            'effective_date' => 'required_if:status_id,5|nullable|date',
            'expiry_date' => 'nullable|date',
            'remarks' => 'string|nullable',
        ]);

        $item = Permit::find($id);
        Permit::where('id', $id)->update([
            'status_id' => $fields['status_id'],
            // 'remarks' => $fields['remarks'],
        ]);

        $mStatusId = $fields['status_id'];
        $mRemarks = $fields['remarks'];
        // Notifications
        if($mStatusId==5){//Approved
            Permit::where('id', $id)->update([
                'status_id' => $fields['status_id'],
                'date_of_issue' => $fields['date_of_issue'],
                'effective_date' => $fields['effective_date'],
                'duration' => 3,
                'expiry_date' => Carbon::parse($fields['effective_date'])->addDays(3),
            ]);

            // Notification
            $mUser = User::find($item->user_id);
            $message = "<div>
                <p>We are glad to inform you that your application has been approved.</p>
                <p>
                    <strong>Application Number:</strong> {$item->application_number} <br>
                    <strong>Remarks:</strong> {$mRemarks} <br>
                </p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'Permit Application',
                'url' => config('app.url').'/permits/show/'.$item->id,
                'btn-text' => 'Submit Detailed Design',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($mUser->email)->send(new AlertMail($data));

        }else if($mStatusId==3){//ToReview
            $mUsers = User::whereIn('role_id', [2,4])->get(); //Compliance/MarketingOfficer
            foreach ($mUsers as $mUser) {
                $message = "<div>
                    <p>The following remarks have been made regarding the following application.</p>
                    <p>
                        <strong>Application Number:</strong> {$item->application_number} <br>
                        <strong>Remarks:</strong> {$mRemarks} <br>
                    </p>
                </div>";
                $data = array(
                    'name' => $mUser->name,
                    'subject' => 'Permit Application',
                    'url' => config('app.url').'/permits/show/'.$item->id,
                    'btn-text' => 'View',
                    'message' => $message,
                    'file' => null,
                    'file_name' => null
                );
                Mail::to($mUser->email)->send(new AlertMail($data));
            }
        }

        $response = [
            'status' => 'success',
            'message' => 'Application status updated successfully',
            'data' => $item
        ];
        return response($response, 201);
    }

}
