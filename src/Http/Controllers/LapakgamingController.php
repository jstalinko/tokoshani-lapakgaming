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
    public function getCategory()
    {
        try {
            $response = $this->lapakgaming->getCategories();
            return $this->buildResponse(true, 200, json_decode($response, true));
        } catch (Exception $e) {
            return $this->buildResponse(false, 500, ['errors' => $e]);
        }
    }

}