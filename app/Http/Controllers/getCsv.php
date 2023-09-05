<?php

namespace App\Http\Controllers;
use App\Models\ProductItem;
use App\Services\getCsvService;
use App\Services\getDollarRateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class getCsv
{
    private $getDollarRateService, $getCsvService;

    public function index()
    {
//        $items = ProductItem::where('title', 'like', '%' . '6ES7154' . '%')->get();
//        $keys = ['title', 'url_product', 'url_image', 'country', 'price', 'condition', 'manufactory', 'model', 'description'];
//        $filename = 'products.csv';
//        $this->generateCsv($items, $keys, $filename);
//        dd('done');
//        $app_id = '92732b0473534bf084ed510dc9da6e90';
//        $oxr_url = "https://openexchangerates.org/api/latest.json?app_id=" . $app_id;
//        $ch = curl_init($oxr_url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $json = curl_exec($ch);
//        curl_close($ch);
//        $oxr_latest = json_decode($json);
//        dd($oxr_latest->rates->RUB);
//        if (!$this->getCsvService) {
//            $this->getCsvService = new getCsvService();
//        }
//        return $this->getCsvService->getCsv('', '', 'https://www.ebay.com/str/jcelectronicsparts');\
//        phpinfo();
        $arr = ['Asia' => [1]];
        $arr['Europe'][] = '321';
        dd($arr);
    }

    public function getCsv(Request $request)
    {
        if (!$this->getCsvService) {
            $this->getCsvService = new getCsvService();
        }
        return $this->getCsvService->getCsv('', '', 'https://www.ebay.com/str/jcelectronicsparts');
    }
}
