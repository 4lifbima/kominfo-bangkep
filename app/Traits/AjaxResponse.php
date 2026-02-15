<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait AjaxResponse
{
    /**
     * Return a success JSON response.
     *
     * @param  string  $message
     * @param  mixed   $data
     * @param  int     $code
     * @return JsonResponse
     */
    protected function success(string $message, $data = [], int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  mixed   $errors
     * @param  int     $code
     * @return JsonResponse
     */
    protected function error(string $message, $errors = [], int $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }
}
