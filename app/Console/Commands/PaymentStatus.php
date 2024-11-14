<?php

namespace App\Console\Commands;

use App\Models\Notification\Notification;
use App\Models\Pay\Pay;
use App\Services\PaymentProject;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PaymentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-payments';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check status of the payments of the ';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        public PaymentProject $paymentProject
    )
    {
        parent::__construct();
    }
    public function handle(): void
    {
        $changedOrderIds = [];
        $payment = Pay::whereNotNull('orderId')
            ->where(['status' => 1])->get();
        $payment->each(function ($payment) use (&$changedOrderIds) {
            $orderId = $payment->orderId;
            $response = Http::withOptions([
                'verify' => false,
                'timeout' => 5
            ])->withHeaders([
                'Content-Type' => 'application/json',
            ])->get(config('pay.base_url') . '/epg/rest/getOrderStatus.do', [
                'userName' => config('pay.username'),
                'password' => config('pay.password'),
                'orderId' => $orderId,
            ]);
            if ($response->successful()) {
                $responseArr = $response->json();
                if($responseArr['ErrorCode'] == 0 ) {
                    $payment->code =$responseArr['ErrorCode'];
                    $payment->status = 2;
                    $payment->save();
                    $changedOrderIds[] = $orderId;
                    $this->paymentProject->update($payment);
                }
                if($responseArr['ErrorCode'] == 2 ) {
                    $data = [
                        'code' => (int)$responseArr['ErrorCode'],
                        'status' => 3,
                    ];
                    $editPay = Pay::editPay($payment->id, $data);
                    if ($editPay) {
                        $changedOrderIds[] = $orderId;
                        Notification::addNotification($payment->employer_id, $responseArr['ErrorMessage'], 1);
                    }
                }
            }
        });
        if (!empty($changedOrderIds)) {
            $this->info('changed orderId: ' . implode(', ', $changedOrderIds));
        } else {
            $this->info('no changed orderId.');
        }
    }
}
