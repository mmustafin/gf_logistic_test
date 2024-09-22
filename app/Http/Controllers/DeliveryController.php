<?php

namespace App\Http\Controllers;

use App\Events\DeliveryDelivered;
use App\Http\Requests\Request;
use App\Http\Resources\User\UserResource;
use App\Models\Delivery;
use App\Services\DeliveryService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Response;

class DeliveryController extends Controller
{
    public function statusChange(Request $request, DeliveryService $service): ResponseFactory|Application|\Illuminate\Http\Response
    {
        $result = $service->statusChange($request);
        if ($result == "failure") {
            abort(Response::HTTP_NOT_FOUND);
        } else {
            // TODO: далее можно отправить нужное событие
            return response('', Response::HTTP_OK);
        }
    }
}
