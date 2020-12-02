<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use App\Services\PropertyService;

class PropertyController extends Controller
{
    /**
     * @var PropertyService
     */

    private $propertyService;

    /**
     * Create a new controller instance.
     * @param PropertyService $propertyService
     *
     * @return void
     */
    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function addProperty(Request $request)
    {
        try {
            // First, validate the request
            $this->validate($request, (new Property())->getRules());
            $this->propertyService->addProperty($request->all());
        } catch (\Exception $e) {
            return response()->json([
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ]
            ], 400);
        }
        return response()->json(['message' => 'Property added successfully']);
    }

    public function addPropertyAnalytic($id, $analyticId, Request $request) {
        try {
            $this->propertyService->addPropertyAnalytic($id, $analyticId, $request->all());
        } catch (\Exception $e) {
            return response()->json([
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ]
            ], 400);
        }
        return response()->json(['message' => 'Property analytic added successfully']);
    }

    public function showPropertyAnalytics($id)
    {
        try {
            $propertyAnalytics = [];
            $propertyAnalytics[] = $this->propertyService->getPropertyAnalytics($id);
        } catch (\Exception $e) {
            return response()->json([
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ]
            ], 400);
        }
        return response()->json($propertyAnalytics);
    }

    public function getSuburbPropertySummary($suburb) {
        try {
            $propertySuburbAnalytics = [];
            $propertySuburbAnalytics[] = $this->propertyService->getPropertySuburbAnalytics($suburb);
        } catch (\Exception $e) {
            return response()->json([
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ]
            ], 400);
        }
        return response()->json($propertySuburbAnalytics);
    }
}
