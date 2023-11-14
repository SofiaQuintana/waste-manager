<?php
namespace App\Enums;


enum UserRole: int {
    case Admin = 1;
    case Manager = 2;
    case Operator = 3;
    case WasteClassifier = 4;
    case Seller = 5;
    case User = 6;

    public static function getDescription($value): string
    {
        switch ($value) {
            case 1;
                return 'Admin';
            case 2;
                return 'Manager';
            case 3;
                return 'Operator';
            case 4;
                return 'WasteClassifier';
            case 5;
                return 'Seller';
            case 6;
                return 'User';
            default;
                return 'Nada';
        }
    }

   
}