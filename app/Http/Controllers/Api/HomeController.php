<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\ProjectResource;
use App\Models\Service;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    /**
     * Retourne toutes les données de la page d'accueil
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'hero' => [
                'title' => 'Digitalisation sur mesure pour les PME du Sénégal',
                'subtitle' => 'Optimisez votre activité, gagnez du temps et augmentez vos revenus grâce à des solutions digitales simples, efficaces et adaptées à votre réalité.',
                'cta' => [
                    'demo' => [
                        'text' => 'Demander une démo',
                        'link' => '/contact',
                    ],
                    'whatsapp' => [
                        'text' => 'Contact WhatsApp',
                        'link' => 'https://wa.me/221789267787',
                    ],
                ],
            ],
            'services' => [
                'title' => 'Ce que je propose',
                'items' => Service::where('category', 'proposition')
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
                    ->all(),
            ],
            'why' => [
                'title' => 'Pourquoi travailler avec moi ?',
                'items' => Service::where('category', 'why')
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
                    ->all(),
            ],
            'project_example' => [
                'title' => 'Exemple de projet',
                'project' => Project::orderBy('order')->first() 
                    ? new ProjectResource(Project::orderBy('order')->first())
                    : null,
            ],
        ]);
    }
}
