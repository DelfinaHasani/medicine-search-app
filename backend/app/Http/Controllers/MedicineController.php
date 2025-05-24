<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index()
    {
        return view('medicine.index');
    }

    public function search(Request $request)
    {
        $codes = array_map('trim', explode(',', $request->input('ndc')));
        $results = [];

        foreach ($codes as $code) {
            // Check local DB
            $local = Medicine::where('ndc_code', $code)->first();

            if ($local) {
                $results[] = [
                    'ndc_code' => $local->ndc_code,
                    'brand_name' => $local->brand_name,
                    'labeler_name' => $local->labeler_name,
                    'product_type' => $local->product_type,
                    'source' => 'Database',
                ];
            } else {
                // Try OpenFDA API
                $response = Http::get("https://api.fda.gov/drug/ndc.json", [
                    'search' => "product_ndc:$code",
                ]);

                if ($response->ok() && isset($response['results'][0])) {
                    $data = $response['results'][0];
                    $results[] = [
                        'ndc_code' => $code,
                        'brand_name' => $data['brand_name'] ?? '-',
                        'labeler_name' => $data['labeler_name'] ?? '-',
                        'product_type' => $data['product_type'] ?? '-',
                        'source' => 'OpenFDA',
                    ];
                } else {
                    $results[] = [
                        'ndc_code' => $code,
                        'brand_name' => '-',
                        'labeler_name' => '-',
                        'product_type' => '0',
                        'source' => 'Not Found',
                    ];
                }
            }
        }

        return view('medicine.index', ['results' => $results]);
    }
}
