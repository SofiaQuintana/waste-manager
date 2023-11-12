<?php
namespace App\Enums;

enum UserRole {
    case Admin;
    case Manager;
    case Operator;
    case WasteClassifier;
    case Seller;
    case User;
    
}