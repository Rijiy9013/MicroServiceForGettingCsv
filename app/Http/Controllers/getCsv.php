<?php

namespace App\Http\Controllers;

use App\Services\getCsvService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class getCsv
{
    private $getDollarRateService, $getCsvService;


    /**
     * Получаем csv файл с данными
     * @param Request $request :
     * - 'title' (string): модель, которую ищем
     * - 'manufactory' (string): производитель
     * - 'seller' (string): ссылка на продавца
     * @return csv:
     *  csv файл
     */
    public function getCsv(Request $request)
    {
        if (!$this->getCsvService) {
            $this->getCsvService = new getCsvService();
        }
        return $this->getCsvService->getCsv($request->title, $request->manufactory, $request->seller);
    }
}
