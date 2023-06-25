<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Helpers\DataHelper;
use App\Property;
use App\AnalyticType;
use App\PropertyAnalytics;
use Illuminate\Database\Eloquent\Collection;
use Exception;

/**
 * PropertyService class.
 */
class PropertyService
{
    /**
     * Fetches property analytics.
     *
     * @param int $id
     *
     * @return array $result
     * @throws Exception
     */
    public function getPropertyAnalytics(int $id)
    {
        // Getting properties
        $propertyAnalytics = Property::find($id)->propertyAnalytics;

        if (!count($propertyAnalytics)) {
            // Throwing error for exceptions.
            throw new Exception("No property analytics found for id ".$id, 404);
        }

        $propertyAnalyticResult = [];
        foreach ($propertyAnalytics as $propertyAnalytic) {
            $propertyAnalyticResult[] = $propertyAnalytic->analyticType;
        }
        return $propertyAnalyticResult;
    }

    /**
     * Adds a new property.
     *
     * @param array $data
     *
     * @return array $result
     * @throws Exception
     */
    public function addProperty(array $data)
    {
        // Generating guid for the property
        $data['guid'] = DataHelper::getUuid();
        try {
            Log::info("Adding new property.");
            Property::Create($data);
        } catch (\Exception $e) {
            throw new Exception("Property could not be created ". $e->getMessage());
        }
    }

    /**
     * Returns Property registration Information.
     *
     * @param int $id
     * @param int $analyticId
     * @param array $data
     * @return array
     */

    public function addPropertyAnalytic(int $id, int $analyticId, array $data)
    {
        // First check if the property and analytic are present
        $property = Property::findOrFail($id);
        $analyticType = AnalyticType::findOrFail($analyticId);
        $propertyAnalytic = new PropertyAnalytics();
        PropertyAnalytics::updateOrCreate(
            [
                'property_id' => $property->id,
                'analytic_type_id' => $analyticType->id
            ],
            [
                'value' => $data['value'],
            ]
        );
    }

    /**
     * Fetches analytics for properties in a suburb.
     *
     * @param string $suburb
     *
     * @return array $result
     * @throws Exception
     */
    public function getPropertySuburbAnalytics(string $suburb)
    {
        // Getting properties
        $properties = Property::where('suburb', $suburb)->get();

        if (!count($properties)) {
            throw new Exception("No property found for suburb ".$suburb, 404);
        }
        return $this->getPropertyAnalyticsSummary($properties);
    }

    private function getPropertyAnalyticsSummary($properties) {
        $propertyAnalyticResult = [];
        foreach ($properties as $property) {
            $propertyAnalyticResult[] = $property->propertyAnalytics;
            // TODO: summary of property analytics to be written.
        }
        return $propertyAnalyticResult;
    }
}
