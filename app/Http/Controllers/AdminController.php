<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\WiFi2BLEAPI;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageUsers()
    {
        $wiFi2BLE = new WiFi2BLEAPI(env('WIFI2BLE_BASE_URL'), env('WIFI2BLE_API_KEY'));
        $desks = $wiFi2BLE->getAllDesks() ?? []; // Fetch available desks from the API

        $users = User::all();
        return view('admin.users', compact('users', 'desks'));
    }

    public function updateDeskId(Request $request, $id)
    {
        $request->validate([
            'desk_id' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);
        $user->desk_id = $request->desk_id;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Desk ID updated successfully!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }
}