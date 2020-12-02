<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

    protected $fillable = ['suburb', 'state', 'country', 'guid'];

    /**
     * Client model validation rules
     */
    public function getRules()
    {
        return [
            'suburb' => 'required|min:3|max:50',
            'state'=>'required|max:3|min:3',
            'country'=>'required|max:128',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'suburb.required' => 'A title is required',
            'state.required' => 'A state is required',
            'country.required' => 'A country is required',
        ];
    }

    /**
     * The PropertyAnalytics that belong to this property.
     */
    public function propertyAnalytics()
    {
        return $this->hasMany(PropertyAnalytics::class);
    }
}
