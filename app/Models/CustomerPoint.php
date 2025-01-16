<?php

namespace App\Models;

use App\Observers\CustomerPointObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(CustomerPointObserver::class)]
class CustomerPoint extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerPointFactory> */
    use HasFactory;
}
