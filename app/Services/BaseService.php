<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\DB;

class BaseService
{
    public $responseCode = 200, $responseMsg, $responseData = null, $line = null;

    protected function executeFunction(callable $function) {
        try {
            DB::beginTransaction();
            $data = call_user_func($function);
            DB::commit();

            return $this->jsonResponse(200, 'Good', $data, 200, 'Good', null);
        } catch (Exception $e) {
            DB::rollback();
            return $this->jsonResponse(500, 'Failed', null, 500, 'DB', $e->getMessage());
        }
    }

    protected function jsonResponse($code, $message, $result = null, $httpCode = 200, $errorMessage = null, $line = null) {
        if ($httpCode === 200) {
            switch ($code) {
                case 201:
                    $result = 'Successfully created.';
                    break;
                case 202:
                    $result = 'Successfully updated.';
                    break;
            }
            return response()->json([
                    "code" => $code,
                    "message" => $message,
                    "result" => $result
                ],
                $httpCode
            );
        }

        return response()->json(
            [
                "code" => $code,
                "message" => $message,
                "error" => [
                    "message" => $line,
                    "data" => $result
                ]
            ],
            $httpCode
        );
    }

    protected function apiResponse($code, $message, $result = null, $httpCode = 200, $errorMessage = null, $line = null, $latency = null) {
        if ($httpCode === 200) {
            return response()->json([
                    "code" => $code,
                    "message" => $message,
                    "data" => $result,
                    'meta' => [
                        'current_page' => $result->currentPage(),
                        'per_page' => $result->perPage(),
                        'total' => $result->total(),
                        'last_page' => $result->lastPage(),
                        'latency' => microtime(true) - $latency
                    ],
                ],
                $httpCode
            );
        }

        return response()->json(
            [
                "code" => $code,
                "message" => $message,
                "error" => [
                    "message" => $line,
                    "data" => $result
                ]
            ],
            $httpCode
        );
    }
}
