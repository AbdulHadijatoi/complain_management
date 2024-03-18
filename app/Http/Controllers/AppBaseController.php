<?php

namespace App\Http\Controllers;

use App\Utils\ResponseUtil;
use Illuminate\Http\JsonResponse;
use Response;

/**
 * Class AppBaseController
 */
class AppBaseController extends Controller {
    
    public function sendDataResponse($data): JsonResponse
    {
        return Response::json($data, 200);
    }

    public function sendError($error, $code = 422): JsonResponse
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message): JsonResponse
    {
        return Response::json([
            'success' => true,
            'message' => $message,
        ], 200);
    }

    public function sendResponse($result, $message): JsonResponse
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }
}
