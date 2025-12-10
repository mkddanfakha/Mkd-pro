<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SimpleCaptchaController extends Controller
{
    /**
     * Génère un nouveau captcha mathématique
     */
    public function generate(): JsonResponse
    {
        // Générer deux nombres aléatoires entre 1 et 9
        $number1 = rand(1, 9);
        $number2 = rand(1, 9);
        
        // Calculer la réponse correcte
        $answer = $number1 + $number2;
        
        // Stocker la réponse en session
        session(['captcha_answer' => $answer]);
        
        // Retourner la question
        return response()->json([
            'question' => "{$number1} + {$number2} = ?",
        ]);
    }

    /**
     * Vérifie la réponse du captcha
     */
    public function verify(Request $request): JsonResponse
    {
        // Valider que la réponse est fournie et numérique
        $validator = Validator::make($request->all(), [
            'answer' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'La réponse est requise et doit être un nombre.',
            ], 422);
        }

        // Récupérer la réponse stockée en session
        $correctAnswer = session('captcha_answer');

        // Vérifier si la session contient une réponse
        if ($correctAnswer === null) {
            return response()->json([
                'success' => false,
                'message' => 'Aucun captcha trouvé. Veuillez générer un nouveau captcha.',
            ], 422);
        }

        // Comparer la réponse fournie avec la réponse correcte
        $userAnswer = (int) $request->input('answer');
        $isCorrect = $userAnswer === $correctAnswer;

        // Ne pas nettoyer la session ici - elle sera nettoyée lors de la soumission finale du formulaire
        // Cela permet une validation préliminaire côté frontend sans invalider le captcha

        if ($isCorrect) {
            return response()->json([
                'success' => true,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Réponse incorrecte.',
        ], 422);
    }
}
