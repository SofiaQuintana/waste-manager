<?php
namespace App\Enums;

enum UserRole: int {
    case Admin = 1;
    case Manager = 2;
    case Operator = 3;
    case WasteClassifier = 4;
    case Seller = 5;
    case User = 6;
    
}