<?php

namespace App\Imports;

use App\Models\Building;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BuildingsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Building([
            'user_id'                  => $row['user_id'],
            'contractor_id'            => $row['contractor_id'],
            'created_by'               => $row['created_by'],
            'manager_id'               => $row['manager_id'],
            'building_manager_id'      => $row['building_manager_id'],
            'strata_manager_id'        => $row['strata_manager_id'],
            'sp_no'                    => $row['sp_no'],
            'name'                     => $row['name'],
            'mobile'                   => $row['mobile'],
            'address'                  => $row['address'],
            'lots'                     => $row['lots'],
            'total_lots'               => $row['total_lots'],
            'commercial_lots'          => $row['commercial_lots'],
            'amenities'                => $row['amenities'],
            'visitors_parking'         => $row['visitors_parking'],
            'gymnasium'                => $row['gymnasium'],
            'tennis_court'             => $row['tennis_court'],
            'other'                    => $row['other'],
            'waste_management'         => $row['waste_management'],
            'resident_garbage'         => $row['resident_garbage'],
            'green_waste'              => $row['green_waste'],
            'spare_keys'               => $row['spare_keys'],
            'registered_keys'          => $row['registered_keys'],
            'lock_out'                 => $row['lock_out'],
            'no_lifts'                 => $row['no_lifts'],
            'contractor_keys'          => $row['contractor_keys'],
            'hours_keys'               => $row['hours_keys'],
            'gas_meter_location'       => $row['gas_meter_location'],
            'electricity_meter_location' => $row['electricity_meter_location'],
            'site_hours'               => $row['site_hours'],
            'committee_member1' => $row['committee_member1'] ?? null,
            'committee_member2' => $row['committee_member2'] ?? null,
            'committee_member3' => $row['committee_member3'] ?? null,
            'committee_member4' => $row['committee_member4'] ?? null,
            'building_notes'           => $row['building_notes'],
            'company'                  => $row['company'],
            'email'                    => $row['email'],
            'category'                 => $row['category'],
        ]);
    }
}
