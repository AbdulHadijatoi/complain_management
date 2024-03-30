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
        $comunas = Comuna::orderBy('id','desc')->get(['name', 'id']);
        $sectors = Sector::orderBy('id','desc')->with('comuna')->get(['comuna_id','name', 'id']);
        $populations = Population::orderBy('id','desc')->with('sector')->get(['sector_id','name', 'id']);
        $type_of_faults = TypeOfFault::orderBy('id','desc')->get(['name', 'id']);
        
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

    // Update Sectors
    public function updateSectors(Request $request)
    {
        $validatedData = $request->validate([
            'comuna_id' => 'required|exists:comuna,id',
            'new_sector_name' => 'required|string|max:255',
        ]);

        // Create or update the Sector
        Sector::updateOrCreate([
            'name' => $validatedData['new_sector_name'],
            'comuna_id' => $validatedData['comuna_id']
        ]);

        return redirect()->back()->withSuccess("Sector updated successfully");
    }

    // Update Populations
    public function updatePopulations(Request $request)
    {
        // return $request->input();
        $validatedData = $request->validate([
            'sector_id' => 'required|exists:sectors,id',
            'new_population_name' => 'required|string|max:255',
        ]);

        // Create or update the Population
        Population::updateOrCreate([
            'name' => $validatedData['new_population_name'],
            'sector_id' => $validatedData['sector_id']
        ]);

        return redirect()->back()->withSuccess("Population updated successfully");
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

    // Update Comuna
    public function updateComuna(Request $request)
    {
        $validatedData = $request->validate([
            'comuna_id' => 'required|exists:comuna,id',
            'edit_comuna_name' => 'required|string|max:255',
        ]);

        $comuna = Comuna::findOrFail($validatedData['comuna_id']);
        $comuna->name = $validatedData['edit_comuna_name'];
        $comuna->save();

        return redirect()->back()->with('success', 'Comuna updated successfully!');
    }

    // Update Sector
    public function updateSector(Request $request)
    {
        $validatedData = $request->validate([
            'sector_id' => 'required|exists:sectors,id',
            'edit_sector_name' => 'required|string|max:255',
            'edit_sector_comuna' => 'required|exists:comuna,id',
        ]);

        $sector = Sector::findOrFail($validatedData['sector_id']);
        $sector->name = $validatedData['edit_sector_name'];
        $sector->comuna_id = $validatedData['edit_sector_comuna'];
        $sector->save();

        return redirect()->back()->with('success', 'Sector updated successfully!');
    }

    // Update Population
    public function updatePopulation(Request $request)
    {
        $validatedData = $request->validate([
            'population_id' => 'required|exists:population,id',
            'edit_population_name' => 'required|string|max:255',
            'edit_population_sector' => 'required|exists:sectors,id',
        ]);

        $population = Population::findOrFail($validatedData['population_id']);
        $population->name = $validatedData['edit_population_name'];
        $population->sector_id = $validatedData['edit_population_sector'];
        $population->save();

        return redirect()->back()->with('success', 'Population updated successfully!');
    }

    // Update Type of Fault
    public function updateFault(Request $request)
    {
        $validatedData = $request->validate([
            'fault_id' => 'required|exists:type_of_faults,id',
            'edit_fault_name' => 'required|string|max:255',
        ]);

        $fault = TypeOfFault::findOrFail($validatedData['fault_id']);
        $fault->name = $validatedData['edit_fault_name'];
        $fault->save();

        return redirect()->back()->with('success', 'Type of Fault updated successfully!');
    }

    // Delete Comuna and its associated Sectors
    public function deleteComuna($id)
    {
        $comuna = Comuna::findOrFail($id);
        $comuna->sectors()->delete(); // Delete associated sectors
        $comuna->delete(); // Delete comuna itself
        return redirect()->back()->with('success', 'Comuna and its associated sectors have been deleted successfully.');
    }

    // Delete Sector and its associated Populations
    public function deleteSector($id)
    {
        $sector = Sector::findOrFail($id);
        $sector->populations()->delete(); // Delete associated populations
        $sector->delete(); // Delete sector itself
        return redirect()->back()->with('success', 'Sector and its associated populations have been deleted successfully.');
    }

    // Delete Population
    public function deletePopulation($id)
    {
        $population = Population::findOrFail($id);
        $population->delete(); // Delete population itself
        return redirect()->back()->with('success', 'Population has been deleted successfully.');
    }

    // Delete Type of Fault
    public function deleteFault($id)
    {
        $fault = TypeOfFault::findOrFail($id);
        $fault->delete(); // Delete type of fault itself
        return redirect()->back()->with('success', 'Type of fault has been deleted successfully.');
    }
    
}
