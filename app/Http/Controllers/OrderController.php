<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Package;
use App\Models\BenefitPackage;
use App\Models\Order;
use Midtrans\Config;
use Exception;
use Midtrans\Snap;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Request $request)
    {
        $products = Product::all(); // Get all products
        $benefits = BenefitPackage::all(); // Get all benefits
        
        $productTypeId = $request->input('product_type', 1); // Get selected product_type
        // $packages = []; // Default empty packages
        // if ($productTypeId) {
        $packages = Package::with('product')->where('product_id', $productTypeId) ->get();
        // }
        
        // $packageId = $request->input('packageId'); // Get selected product_type
        // $benefits = []; // Default empty packages
        // if ($packageId) {
            //     $benefits = BenefitPackage::with('package')->where('packages_id', $packageId) ->get(); // Get all products
            // }
            
        return view('order', compact('products', 'packages', 'benefits'));
    }
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'package_id' => 'required|int',
            'request' => 'text',
            'orientation' => 'required|string',
        ]);
    
        
        // $order->id = (string) Str::uuid(); // Generate UUID
        // Set other order properties from the request
        // e.g., $order->user_id = auth()->id();
        // $order->total = $request->total;
        // $order->save();
        // Insert data ke database
        Order::create([
            'user_id' => Auth::user()->id,
            'package_id'=> $request->package_id,
            'request' => $request->requestInput,
            'orientation' => $request->orientation,
        ]);
        $order = Order::orderBy('created_at', 'desc')->first();
        session()->put('order_id', $order->id);
        return redirect()->route('payment');
    }
    // public function processPayment(Request $request)
    // {
    //     // Konfigurasi Midtrans
    //     Config::$serverKey = config('midtrans.server_key');
    //     Config::$isProduction = config('midtrans.is_production');
    //     Config::$isSanitized = config('midtrans.is_sanitized');
    //     Config::$is3ds = config('midtrans.is_3ds');

    //     // Mendapatkan data order dari database
    //     $order_id = session('order_id');
    //     $order = Order::where('id', $order_id)->first();
    //     // Parameter yang dikirim ke Midtrans
    //     $params = [
    //             'transaction_details' => [
    //                     'order_id' => $order->id,
    //                     'gross_amount' => $order->price,
    //                 ],
    //                 'customer_details' => [
    //                         'first_name' => $order->user->name,
    //                         'email' => $order->user->email,
    //                         'phone' => $order->user->phone,
    //                     ],
    //                 'item_details' => [
    //                     [
    //                         'package-name' => $order->package->name,
    //                         'price' => $order->price,
    //                         'orientation' => $order->orientation,
    //                         'request' => $order->request,
    //                     ],
    //         ],
    //     ];
        
    //     try {
    //             // Mendapatkan Snap Token dari Midtrans
    //         $snapToken = Snap::getSnapToken($params);
            
    //             // Menampilkan halaman checkout dengan Snap Token
    //         return view('payment', compact('snapToken', 'order'));
    //     //     return view('payment', ['snapToken' => $snapToken, 'order' => $order]);
    //     } catch (Exception $e) {
    //         return back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
    //     }
    // }
}
