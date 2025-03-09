<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function foodNbeverage()
    {
        return [
            ["id" => 1, "name" => "Susu UHT", "price" => 15000],
            ["id" => 2, "name" => "Biskuit Gandum", "price" => 12000]
        ];
    }

    public function beautyHealth()
    {
        return [
            ["id" => 1, "name" => "Sabun Muka", "price" => 30000],
            ["id" => 2, "name" => "Shampoo Herbal", "price" => 25000]
        ];
    }

    public function homeCare()
    {
        return [
            ["id" => 1, "name" => "Pembersih Lantai", "price" => 20000],
            ["id" => 2, "name" => "Pewangi Ruangan", "price" => 18000]
        ];
    }

    public function babyKid()
    {
        return [
            ["id" => 1, "name" => "Popok Bayi", "price" => 50000],
            ["id" => 2, "name" => "Susu Formula", "price" => 75000]
        ];
    }
}