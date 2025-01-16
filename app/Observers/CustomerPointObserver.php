<?php

namespace App\Observers;

use App\Models\CustomerPoint;
use App\Supports\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerPointObserver
{
    /**
     * Handle the CustomerPoint "creating" event.
     */
    public function creating(CustomerPoint $customerPoint): void
    {
        $date = Carbon::now();
        $max_ordering = DB::table('customer_points')
            ->whereDate('customer_points.created_at', Carbon::parse($date))
            ->max('ordering');

        if (!$max_ordering) {
            $new_ordering = Carbon::parse($date)->format('Ymd') . "-" . sprintf("%05s", 1);
        } else {
            $explode_ordering = explode("-", $max_ordering)[1];
            $new_ordering = Carbon::parse($date)->format('Ymd') . "-" . sprintf("%05s", $explode_ordering + 1);
        }

        $customerPoint->ordering = $new_ordering;
        $customerPoint->expired_at = Carbon::parse($date)->addYear();
    }

    /**
     * Handle the CustomerPoint "created" event.
     */
    public function created(CustomerPoint $customerPoint): void
    {
        //
    }

    /**
     * Handle the CustomerPoint "updated" event.
     */
    public function updated(CustomerPoint $customerPoint): void
    {
        //
    }

    /**
     * Handle the CustomerPoint "deleted" event.
     */
    public function deleted(CustomerPoint $customerPoint): void
    {
        //
    }

    /**
     * Handle the CustomerPoint "restored" event.
     */
    public function restored(CustomerPoint $customerPoint): void
    {
        //
    }

    /**
     * Handle the CustomerPoint "force deleted" event.
     */
    public function forceDeleted(CustomerPoint $customerPoint): void
    {
        //
    }
}
