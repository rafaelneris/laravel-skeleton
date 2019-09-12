<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;

/**
 * Trait JsonResponseTrait
 * @package App\Http
 * @author Rafael Neris Cruz <rafaelnerisdj@gmail.com>
 */
trait JsonResponseTrait
{
    /**
     * @param array $data
     * @param integer $statusCode
     * @return JsonResponse
     */
    public function response($data, $statusCode)
    {
        return response()->json($data, $statusCode);
    }
}
