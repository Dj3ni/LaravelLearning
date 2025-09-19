<?php
declare(strict_types=1);

namespace App\Enums;

enum CaracteristicsEnum : string
{
    case BEDROOMS = 'Bedrooms';
    case ROOMS = 'Rooms';
    case HEATING_SYSTEM = "Heating System";
    case SURFACE = "Surface";
    case FLOOR = "Floor";
}