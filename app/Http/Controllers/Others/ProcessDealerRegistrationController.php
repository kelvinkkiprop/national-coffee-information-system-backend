<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Carbon\Carbon;
use App\Models\User;
use App\Models\Others\DealerRegistrationStatus;
// Notifications
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class ProcessDealerRegistrationController extends Controller
{

    /**
    * nextPreviousItems
    */
    public function nextPreviousItems(string $id)
    {
        // return DealerRegistrationStatus::where('id', $id-1)->orwhere('id', $id+1)->get();
        if($id>=3){
            // return DealerRegistrationStatus::where('id','>=', $id)->get();
        return DealerRegistrationStatus::where('id', $id-1)->orwhere('id', $id+1)->orwhere('id', $id+2)->get();
        }
        return DealerRegistrationStatus::where('id', $id-1)->orwhere('id', $id+1)->get();
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
        $item = User::find($id);
        User::where('id', $id)->update([
            'dealer_registration_status_id' => $mStatusId,
            // 'remarks' => $fields['remarks'],
        ]);
        if($mStatusId==2){//Returned
            $fields = $request->validate([
                'remarks' => 'string|nullable',
            ]);
            $mUser = User::find($item->id);
            $message = "<div>
                <p>We regret to inform you that your application has been returned.</p>
                <p>
                    <strong>Remarks:</strong> {$mRemarks} <br>
                </p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'Dealer Registrations Application',
                'url' => config('app.url').'/#/dealer-registrations/show/'.$item->id,
                'btn-text' => 'View',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($mUser->email)->send(new AlertMail($data));

        }else if($mStatusId==4){//Approved
            // Notification
            $mUser = User::find($item->id);
            $message = "<div>
                <p>We are glad to inform you that your application has been approved.</p>
                <p>
                    <strong>Remarks:</strong> {$mRemarks} <br>
                </p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'Dealer Registration Application',
                'url' => config('app.url').'/#/dealer-registrations/show/'.$item->id,
                'btn-text' => 'View',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($mUser->email)->send(new AlertMail($data));
        }else if($mStatusId==5){//Rejected
            User::where('id', $id)->update([
                'dealer_registration_status_id' => null,
                // 'remarks' => $fields['remarks'],
            ]);
            // Notification
            $mUser = User::find($item->id);
            $message = "<div>
                <p>We regret to inform you that your application has been rejected.</p>
                <p>
                    <strong>Remarks:</strong> {$mRemarks} <br>
                </p>
            </div>";
            $data = array(
                'name' => $mUser->name,
                'subject' => 'Dealer Registration Application',
                'url' => config('app.url').'/#/dealer-registrations/show/'.$item->id,
                'btn-text' => 'View',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($mUser->email)->send(new AlertMail($data));
        }

        $response = [
            'status' => 'success',
            'message' => 'Application status updated successfully',
            'data' => $item
        ];
        return response($response, 201);
    }


}
