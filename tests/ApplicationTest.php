<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Property;
use App\AnalyticType;
use App\PropertyAnalytics;

class ApplicationTest extends TestCase
{

    /**
     * setUp.
     */
    public function setUp(): void
    {
        parent::setUp();
    }


    /**
     * tearDown.
     */
    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @group Controller
     * @coversDefaultClass \App\Http\Controllers\PropertyController
     */

    public function testshowPropertyAnalytics()
    {
        // Creating property
        $property = factory(Property::class)->create();
        // Creating analytic types
        $analyticType = factory(AnalyticType::class)->create();
        // mapping property AnalyticType
        $propertyAnalytics = factory(PropertyAnalytics::class)->create(
            [
                'property_id' => $property->id,
                'analytic_type_id' => $analyticType
            ]
        );
        $response = $this->call('GET', '/api/v1/properties/'.$property->id.'/analytics');
        // Asserting that the end point return response successfully
        $this->assertEquals(200, $response->status());

        // Asserting that returned data matches expected data.
        $this->assertEquals($response->original[0][0]->name, $analyticType->name);
        $this->assertEquals($response->original[0][0]->units, $analyticType->units);
    }
}
