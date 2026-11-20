<?php
namespace App\Policies;

use App\Models\Calculation;
use App\Models\User;

class CalculationPolicy
{
    // Ejemplo educativo de autorización. Para datos privados, vincular al usuario propietario.
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Calculation $calculation): bool
    {
        return true;
    }
}
