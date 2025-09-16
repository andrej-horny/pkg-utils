<?php

namespace Dpb\Packages\Tickets\Database\Seeders;

use Dpb\Packages\Tickets\Models\TicketGroup;
use Dpb\Packages\Tickets\Models\TicketPriority;
use Dpb\Packages\Tickets\Models\TicketStatus;
use Dpb\Packages\Utils\Models\Currency;
use Dpb\Packages\Utils\Models\MeasurementUnit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    protected $prefix = config('pkg-utils.table_prefix');

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table($this->prefix . 'measurement_units')->truncate();
        DB::table($this->prefix . 'curerncy')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // measurement units
        $units = [
            ['code' => 'ks', 'title' => 'Kus'],
            ['code' => 'hod', 'title' => 'Hodina'],
            ['code' => 'min', 'title' => 'Minúta'],
            ['code' => 'm', 'title' => 'Meter'],
            ['code' => 'km', 'title' => 'Kilometer'],
        ];

        foreach ($units as $unit) {
            MeasurementUnit::create($unit);
        }

        // currency
        $currencies = [
            ['code' => 'eur', 'title' => 'Euro'],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}