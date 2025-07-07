<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        return response()->json($projects);
    }

    public function show(Project $project)
    {
        return response()->json($project);
    }

    public function generateDetailedDescription(Request $request)
    {
        $request->validate([
            'short_description' => 'required|string|min:10',
        ]);

        $prompt = "Perluas deskripsi proyek berikut menjadi paragraf yang lebih detail dan menarik, fokus pada tujuan, fitur utama, dan dampaknya. Gunakan bahasa yang profesional dan persuasif. Deskripsi singkat: '" . $request->short_description . "'";

        try {
            $apiKey = env('GEMINI_API_KEY', '');
            if (empty($apiKey)) {
                return response()->json(['error' => 'GEMINI_API_KEY tidak dikonfigurasi di .env'], 500);
            }

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}", [
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => $prompt],
                        ],
                    ],
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 500,
                ],
            ]);

            $result = $response->json();

            if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
                $detailedDescription = $result['candidates'][0]['content']['parts'][0]['text'];
                return response()->json(['detailed_description' => $detailedDescription]);
            } else {
                \Log::error('Gemini API response error:', $result);
                return response()->json(['error' => 'Gagal menghasilkan deskripsi detail. Respons API tidak valid.'], 500);
            }

        } catch (\Exception $e) {
            \Log::error('Error calling Gemini API: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat menghubungi layanan AI.'], 500);
        }
    }
}