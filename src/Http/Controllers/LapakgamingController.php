<?php

namespace Jstalinko\TokoshaniLapakgaming\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Jstalinko\TokoshaniLapakgaming\TokoshaniLapakgaming;
use stdClass;

class LapakgamingController extends Controller
{
    protected $lapakgaming;

    public function __construct(TokoshaniLapakgaming $lapakgaming)
    {
        $this->lapakgaming = $lapakgaming;
    }

    public function buildResponse(bool $success, int $code, array|stdClass $data): JsonResponse
    {
        $response['success'] = $success;
        $response['code'] = $code;
        $response['shnData'] = $data;
        $response['x-api'] = "jstalinko/tokoshani-lapakgaming";

        return response()->json($response, $code, [], JSON_PRETTY_PRINT);
    }

    public function isJson($jsonString, $returnError = false)
    {
        $result = json_decode($jsonString);

        if (json_last_error() === JSON_ERROR_NONE) {
            return true;
        } else {
            if ($returnError) {
                return json_last_error_msg();
            }
            return false;
        }
    }

    public function getCategory()
    {
        try {
            $response = $this->lapakgaming->getCategories();
            if ($this->isJson($response)) {
                return $this->buildResponse(true, 200, json_decode($response, true));
            } else {
                return $this->buildResponse(true, 200, ['success' => false, 'errors' => $response]);
            }
        } catch (Exception $e) {
            return $this->buildResponse(false, 500, ['success' => false, 'errors' => $e->getMessage()]);
        }
    }

    public function getProduct(Request $request): JsonResponse
    {
        $category_code = $request->category_code !== '' ? $request->category_code : null;
        $product_code = $request->product_code !== '' ? $request->product_code : null;

        try {
            if ($category_code === null) {
                $response = $this->lapakgaming->getProduct($product_code);
            } elseif ($product_code === null) {
                $response = $this->lapakgaming->getProductsByCategory($category_code);
            } else {
                return $this->buildResponse(false, 404, ['errors' => 'Not found code params']);
            }

            if ($this->isJson($response)) {
                return $this->buildResponse(true, 200, json_decode($response, true));
            } else {
                return $this->buildResponse(true, 200, ['success' => false, 'errors' => $response]);
            }
        } catch (Exception $e) {
            return $this->buildResponse(false, 500, ['success' => false, 'errors' => $e->getMessage()]);
        }
    }

    public function getProducts(): JsonResponse
    {
        try {
            $response = $this->lapakgaming->getAllProducts();

            if ($this->isJson($response)) {
                return $this->buildResponse(true, 200, json_decode($response, true));
            } else {
                return $this->buildResponse(true, 200, ['success' => false, 'errors' => $response]);
            }
        } catch (Exception $e) {
            return $this->buildResponse(false, 500, ['success' => false, 'errors' => $e->getMessage()]);
        }
    }

    public function orderStatus(Request $request): JsonResponse
    {
        try {
            $response = $this->lapakgaming->getOrderStatus($request->txid);

            if ($this->isJson($response)) {
                return $this->buildResponse(true, 200, json_decode($response, true));
            } else {
                return $this->buildResponse(true, 200, ['success' => false, 'errors' => $response]);
            }
        } catch (Exception $e) {
            return $this->buildResponse(false, 500, ['success' => false, 'errors' => $e->getMessage()]);
        }
    }

    public function checkUid(Request $request): JsonResponse
    {
        // Validate mandatory fields and allow optional fields
        $validated = $request->validate([
            'category_code' => 'required|string',
            'user_id' => 'required|string',
            'additional_id' => 'nullable|string',
            'additional_information' => 'nullable|string',
        ]);

        try {
            // Call the LapakGaming service and pass the required and optional data
            $response = $this->lapakgaming->checkUid(
                $validated['category_code'],
                $validated['user_id'],
                $validated['additional_id'] ?? null, // Pass null if not provided
                $validated['additional_information'] ?? null // Pass null if not provided
            );

            if ($this->isJson($response)) {
                return $this->buildResponse(true, 200, json_decode($response, true));
            } else {
                return $this->buildResponse(true, 200, ['success' => false, 'errors' => $response]);
            }
        } catch (\Exception $e) {
            return $this->buildResponse(false, 500, ['success' => false, 'errors' => $e->getMessage()]);
        }
    }
}
