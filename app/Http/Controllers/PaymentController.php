<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Mendapatkan data order dari database
        $order_id = session('order_id');
        $order = Order::where('id', $order_id)->first();
        // Parameter yang dikirim ke Midtrans
        $params = [
                'transaction_details' => [
                        'order_id' => $order->id,
                        'gross_amount' => $order->price,
                    ],
                    'customer_details' => [
                            'first_name' => $order->user->name,
                            'email' => $order->user->email,
                            'phone' => $order->user->phone,
                        ],
        //             'item_details' => [
        //                 [
        //                     'package-name' => $order->package->name,
        //                     'price' => $order->price,
        //                     'orientation' => $order->orientation,
        //                     'request' => $order->request,
        //                 ],
            // ],
        ];
        
        try {
                // Mendapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);
            
        //         // Menampilkan halaman checkout dengan Snap Token
            // return view('payment', compact('order'));
            return view('payment', compact('snapToken', 'order'));
        // //     return view('payment', ['snapToken' => $snapToken, 'order' => $order]);
        } catch (Exception $e) {
            return back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    // public function handleNotification(Request $request)
    // {
    //     // Logika untuk menangani notifikasi dari Midtrans
    // }
}
