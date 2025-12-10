<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AboutController extends Controller
{
    /**
     * Retourne le texte de présentation
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'title' => 'À propos de moi',
            'content' => 'Développeur web spécialisé en digitalisation des PME du Sénégal.',
            'expertise' => 'Expert Laravel, Vue.js et outils d\'IA type Cursor.',
            'mission' => 'Ma mission : digitaliser les PME sénégalaises avec des solutions simples, efficaces et accessibles.',
            'values' => [
                [
                    'name' => 'Simplicité',
                    'description' => 'Des solutions faciles à utiliser et à comprendre, sans complexité inutile.',
                ],
                [
                    'name' => 'Transparence',
                    'description' => 'Communication claire et honnête sur les processus et les tarifs.',
                ],
                [
                    'name' => 'Fiabilité',
                    'description' => 'Des solutions robustes et un support fiable pour votre tranquillité d\'esprit.',
                ],
                [
                    'name' => 'Adaptation',
                    'description' => 'Des solutions sur mesure adaptées à votre contexte et vos besoins spécifiques.',
                ],
            ],
        ]);
    }
}
