<?php
namespace App\Services;
use App\Models\Chats\ChatMessages;
use App\Models\Chats\Chats;
use App\Models\Notification\Notification;
use App\Models\Pay\Pay;
use App\Models\Project\ProjectHireds;
use App\Models\ProjectProposals;
use Carbon\Carbon;
class PaymentProject
{
    public function update(Pay $pay)
    {
        $date = Carbon::parse($pay->created_at)->toDateString();
        $proposal = ProjectProposals::where(
            [
                'freelancer_id' => $pay->freelancer_id,
                'price' => $pay->amount,
                'employer_id' => $pay->employer_id,
            ]
        )->whereDate('created_at', $date)->first();
        if ($proposal) {
            $data = [
                'freelancer_id' => $pay->freelancer_id,
                'employer_id' =>  $pay->employer_id,
                'price' => $pay->amount,
                'hours' => $proposal->hours,
                'letter' => language('I accepted your proposal and made payment. Please start doing work.'),
                'status' => 1
            ];
            ProjectHireds::addHireds($data, $proposal);
            $employer_text = language('The payment was successful and the task was sent to the freelancer.');
            $freelancer_text = language('The employer accepted your offer and paid. Immediately, get to work.');
            Notification::addNotification($pay->employer_id, $employer_text, 1);
            Notification::addNotification($pay->freelancer_id, $freelancer_text, 1);
            $user_from = $pay->employer_id;
            $user_to = $pay->freelancer_id;
            $message = language('I chose you and paid. Please get to work immediately.');
            $file = "";
            $chat = Chats::getChat($user_from, $user_to);
            if (!$chat) {
                Chats::createChat($user_from, $user_to);
            }
            ChatMessages::addMessages($user_from, $user_to, $message, $file);
        }
    }
}
