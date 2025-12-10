<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    /**
     * Liste tous les services
     */
    public function index(): JsonResponse
    {
        // Filtrer uniquement les services de la catégorie "service" pour la page Services
        $services = Service::where('category', 'service')
            ->orderBy('order')
            ->get()
            ->map(fn($service) => [
                'id' => $service->id,
                'title' => $service->title,
                'description' => $service->description,
                'icon' => $service->icon,
                'category' => $service->category,
                'order' => $service->order,
            ])
            ->values()
            ->all();
        
        return response()->json($services);
    }

    /**
     * Affiche un service spécifique
     */
    public function show(string $id): JsonResponse|ServiceResource
    {
        $service = Service::find($id);
        
        if (!$service) {
            return response()->json([
                'message' => 'Service non trouvé',
            ], 404);
        }

        return new ServiceResource($service);
    }
}
