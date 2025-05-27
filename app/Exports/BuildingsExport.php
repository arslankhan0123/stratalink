<?php

namespace App\Exports;

use App\Models\Building;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BuildingsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Building::select([
            'id', 'user_id', 'contractor_id', 'created_by', 'manager_id', 'building_manager_id',
            'strata_manager_id', 'sp_no', 'name', 'mobile', 'address', 'lots', 'total_lots',
            'commercial_lots', 'amenities', 'visitors_parking', 'gymnasium', 'tennis_court', 'other',
            'waste_management', 'resident_garbage', 'green_waste', 'spare_keys', 'registered_keys',
            'lock_out', 'no_lifts', 'contractor_keys', 'hours_keys', 'gas_meter_location',
            'electricity_meter_location', 'site_hours', 'committee_member1', 'committee_member2',
            'committee_member3', 'committee_member4', 'building_notes', 'company', 'email',
            'category', 'created_at', 'updated_at'
        ])->get();
    }

    public function headings(): array
    {
        return [
            'ID', 'User ID', 'Contractor ID', 'Created By', 'Manager ID', 'Building Manager ID',
            'Strata Manager ID', 'SP No', 'Name', 'Mobile', 'Address', 'Lots', 'Total Lots',
            'Commercial Lots', 'Amenities', 'Visitors Parking', 'Gymnasium', 'Tennis Court', 'Other',
            'Waste Management', 'Resident Garbage', 'Green Waste', 'Spare Keys', 'Registered Keys',
            'Lock Out', 'No Lifts', 'Contractor Keys', 'Hours Keys', 'Gas Meter Location',
            'Electricity Meter Location', 'Site Hours', 'Committee Member 1', 'Committee Member 2',
            'Committee Member 3', 'Committee Member 4', 'Building Notes', 'Company', 'Email',
            'Category', 'Created At', 'Updated At'
        ];
    }
}

