<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class PropertyAnalytics extends Model
{
    protected $table = 'property_analytics';

    protected $fillable = ['property_id', 'analytic_type_id', 'value'];

    /**
     * A PropertyAnalytics is assigned to an AnalyticType
     *
     * @return Relation
     */
    public function analyticType()
    {
        return $this->belongsTo(AnalyticType::class);
    }

    /**
     * A PropertyAnalytics is assigned to a property
     *
     * @return Relation
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
