<?php
namespace App\ViewModels;

use App\Models\Property;

class PropertyViewModel
{
    public function getAllProperties()
    {
        $properties = Property::all();

        return $properties;
    }
}