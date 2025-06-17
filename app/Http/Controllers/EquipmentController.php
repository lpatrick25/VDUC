<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EquipmentController extends Controller
{
    public function index()
    {
        try {
            $equipment = Equipment::all();
            return $this->success($equipment, 'Equipment retrieved successfully');
        } catch (\Exception $e) {
            Log::error('Failed to fetch equipment: ' . $e->getMessage());
            return $this->failed(null, 'Failed to fetch equipment', 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipment_name' => 'required|string|max:255',
            'quantity'       => 'required|integer|min:1',
            'equipment_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $equipment = Equipment::create($validated);
            if ($request->hasFile('equipment_image')) {
                $path = $request->file('equipment_image')->store('equipment_images', 'public');
                $equipment->image = $path;
                $equipment->save();
            }
            return $this->success($equipment, 'Equipment created successfully', 201);
        } catch (\Exception $e) {
            Log::error('Failed to create equipment: ' . $e->getMessage());
            return $this->failed(null, 'Failed to create equipment', 500);
        }
    }

    public function show($id)
    {
        try {
            $equipment = Equipment::findOrFail($id);
            return $this->success($equipment, 'Equipment retrieved successfully');
        } catch (\Exception $e) {
            Log::error("Failed to retrieve equipment ID {$id}: " . $e->getMessage());
            return $this->failed(null, 'Equipment not found', 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $equipment = Equipment::findOrFail($id);

            $validated = $request->validate([
                'equipment_name' => 'sometimes|required|string|max:255',
                'quantity'       => 'sometimes|required|integer|min:1',
                'equipment_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $equipment->update($validated);
            if ($request->hasFile('equipment_image')) {
                $path = $request->file('equipment_image')->store('equipment_images', 'public');
                $equipment->image = $path;
                $equipment->save();
            }
            return $this->success($equipment, 'Equipment updated successfully');
        } catch (\Exception $e) {
            Log::error("Failed to update equipment ID {$id}: " . $e->getMessage());
            return $this->failed(null, 'Failed to update equipment', 500);
        }
    }

    public function destroy($id)
    {
        try {
            $equipment = Equipment::findOrFail($id);
            $equipment->delete();
            return $this->success(null, 'Equipment deleted successfully');
        } catch (\Exception $e) {
            Log::error("Failed to delete equipment ID {$id}: " . $e->getMessage());
            return $this->failed(null, 'Failed to delete equipment', 500);
        }
    }
}
