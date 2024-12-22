<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class STLController extends Controller
{
    public function generateSTL(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $text = $request->input('text');
        $outputFile = 'output.stl';

        // Execute the Python script
        $command = escapeshellcmd("python3 /var/www/laravel/scripts/create_stl.py " . escapeshellarg($text) . " " . escapeshellarg($outputFile));
        $output = shell_exec($command);

        if (!file_exists($outputFile)) {
            return response()->json(['error' => 'Failed to generate STL file'], 500);
        }

        // Return the file content directly
        return response()->file($outputFile, [
            'Content-Type' => 'application/sla',
            'Content-Disposition' => 'attachment; filename="' . basename($outputFile) . '"',
        ]);
    }
}
