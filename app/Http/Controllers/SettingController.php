<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Comuna;
use App\Models\Population;
use App\Models\Sector;
use App\Models\TypeOfFault;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request) {
        $comunas = Comuna::get(['name', 'id']);
        $populations = Population::get(['name', 'id']);
        $sectors = Sector::get(['name', 'id']);
        $type_of_faults = TypeOfFault::get(['name', 'id']);
        
        return view('admin.settings.index', compact('comunas', 'populations', 'sectors', 'type_of_faults'));
    }

    // Update Comunas
    public function updateComunas(Request $request)
    {
        $validatedData = $request->validate([
            'new_comuna_name' => 'required|string|max:255',
        ]);

        // Create or update the Comuna
        Comuna::updateOrCreate(['name' => $validatedData['new_comuna_name']]);

        return redirect()->back()->withSuccess("Comuna updated successfully");
    }

    // Update Populations
    public function updatePopulations(Request $request)
    {
        $validatedData = $request->validate([
            'new_population_name' => 'required|string|max:255',
        ]);

        // Create or update the Population
        Population::updateOrCreate(['name' => $validatedData['new_population_name']]);

        return redirect()->back()->withSuccess("Population updated successfully");
    }

    // Update Sectors
    public function updateSectors(Request $request)
    {
        $validatedData = $request->validate([
            'new_sector_name' => 'required|string|max:255',
        ]);

        // Create or update the Sector
        Sector::updateOrCreate(['name' => $validatedData['new_sector_name']]);

        return redirect()->back()->withSuccess("Sector updated successfully");
    }

    // Update Type of Faults
    public function updateTypeOfFaults(Request $request)
    {
        $validatedData = $request->validate([
            'new_type_of_fault_name' => 'required|string|max:255',
        ]);

        // Create or update the Type of Fault
        TypeOfFault::updateOrCreate(['name' => $validatedData['new_type_of_fault_name']]);

        return redirect()->back()->withSuccess("Type of Fault updated successfully");
    }
    
}
