<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /**
     * Liste tous les projets
     */
    public function index(): JsonResponse
    {
        $projects = Project::orderBy('order')
            ->get()
            ->map(function($project) {
                // S'assurer que l'image est correctement décodée si c'est une chaîne JSON
                $image = $project->image;
                if (is_string($image)) {
                    $decoded = json_decode($image, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $image = $decoded;
                    }
                }
                
                return [
                    'id' => $project->id,
                    'title' => $project->title,
                    'client' => $project->client,
                    'description' => $project->description,
                    'features' => $project->features ?? [],
                    'image' => $image,
                    'order' => $project->order,
                ];
            })
            ->values()
            ->all();
        
        return response()->json($projects);
    }

    /**
     * Affiche un projet spécifique
     */
    public function show(string $id): JsonResponse|ProjectResource
    {
        $project = Project::find($id);
        
        if (!$project) {
            return response()->json([
                'message' => 'Projet non trouvé',
            ], 404);
        }

        return new ProjectResource($project);
    }
}
