<?php

namespace App\Services;

use App\Models\ProductItem;
use App\Models\ProductSeller;

class getCsvService
{
    private $keys = ['title', 'url_product', 'url_image', 'country', 'price_product_dollar', 'condition', 'manufactory', 'model', 'description'];

    public function getCsv($title = null, $manufactory = null, $seller = null)
    {
        if ($title) {
            $items = ProductItem::where('title', 'like', '%' . $title . '%')->where('is_published', 'true')->get();
        }
        elseif ($manufactory){
            $items = ProductItem::where('manufactory', 'like', '%' . $manufactory . '%')->where('is_published', 'true')->get()->limit(100);
        }
        elseif($seller){
            try{
                $substring = substr($seller, strrpos($seller, "/") + 1);
                $seller_info = ProductSeller::where('url_seller', 'like', '%' . $substring . '%')
                    ->get()->last()->toArray();
                $items = ProductItem::where('seller_id', $seller_info['id'])->where('is_published', 'true')->get();
            }catch(\Exception $e){
            }
        }
        return $this->generateCsv($items, $this->keys, "results.csv");
    }

    private function generateCsv($data, array $keys, string $filename)
    {
        $csvData = $data->map(function ($item) use ($keys) {
            return array_map(function ($key) use ($item) {
                return $item[$key] ?? '';
            }, $keys);
        });

        $csv = implode(',', $keys) . "\n";
        $csv .= $csvData->map(function ($row) {
            return implode(',', $row);
        })->implode("\n");

        return $this->sendCsv($filename, $csv);
    }

    private function sendCsv(string $filename, $csv){
        file_put_contents($filename, $csv);
        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
