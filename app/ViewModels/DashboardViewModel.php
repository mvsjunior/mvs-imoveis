<?php
namespace App\ViewModels;

use App\Models\Property;

class DashboardViewModel
{
    public $properties = 50;

    public function getNumTotalProperties(): int
    {
        $properties = Property::all();

        return count($properties);
    }

    public function getNumPropertiesRented()
    {
        $properties = Property::where('is_rented', true)->get();

        return count($properties);
    }

    public function getNumPropertiesNotRented()
    {
        $properties = Property::where('is_rented', false)->get();

        return count($properties);
    }
}