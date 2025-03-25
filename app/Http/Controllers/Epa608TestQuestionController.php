<?php
// filepath: /app/Http/Controllers/Epa608TestQuestionController.php
namespace App\Http\Controllers;

use App\Models\Epa608TestQuestion;
use Illuminate\Http\Request;

class Epa608TestQuestionController extends Controller
{
    public function index()
    {
        $questions = Epa608TestQuestion::inRandomOrder()->get();
        return response()->json($questions);
    }
}
