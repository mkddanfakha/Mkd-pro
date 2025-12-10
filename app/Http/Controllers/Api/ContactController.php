<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreContactRequest;
use App\Http\Resources\ContactResource;
use App\Mail\ContactNotification;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Enregistre un nouveau message de contact
     */
    public function store(StoreContactRequest $request): JsonResponse
    {
        // Valider le captcha avant de traiter le formulaire
        $captchaAnswer = $request->input('captcha_answer');
        $sessionAnswer = $request->session()->get('captcha_answer');

        if ($captchaAnswer === null || $sessionAnswer === null || (int) $captchaAnswer !== (int) $sessionAnswer) {
            // Nettoyer la session après échec
            $request->session()->forget('captcha_answer');
            
            return response()->json([
                'error' => 'captcha_invalid',
                'message' => 'La vérification du captcha a échoué. Veuillez réessayer.',
            ], 422);
        }

        // Nettoyer la session après validation réussie
        $request->session()->forget('captcha_answer');

        $validated = $request->validated();
        
        // Retirer captcha_answer des données validées avant de créer le contact
        unset($validated['captcha_answer']);
        
        // Créer le contact en base de données
        $contact = Contact::create($validated);

        // Envoyer l'email de notification
        $emailSent = false;
        $emailError = null;
        
        try {
            // Vérifier que la configuration email est correcte
            if (config('mail.default') === 'log') {
                \Log::warning('Mailer configuré en mode LOG - les emails ne seront pas réellement envoyés', [
                    'contact_id' => $contact->id,
                ]);
            }
            
            $result = Mail::to('dmohamedkounta@gmail.com')->send(
                new ContactNotification($validated)
            );
            
            $emailSent = true;
            \Log::info('Email de contact envoyé avec succès à dmohamedkounta@gmail.com', [
                'contact_id' => $contact->id,
                'name' => $validated['name'],
                'email' => $validated['email'] ?? 'N/A',
                'phone' => $validated['phone'],
                'mailer' => config('mail.default'),
            ]);
        } catch (\Symfony\Component\Mailer\Exception\TransportExceptionInterface $e) {
            $emailError = 'Erreur de connexion SMTP: ' . $e->getMessage();
            \Log::error('Erreur SMTP lors de l\'envoi de l\'email de contact', [
                'error' => $e->getMessage(),
                'contact_id' => $contact->id,
                'mail_config' => [
                    'driver' => config('mail.default'),
                    'host' => config('mail.mailers.smtp.host'),
                    'port' => config('mail.mailers.smtp.port'),
                    'username' => config('mail.mailers.smtp.username') ? '***' : 'non configuré',
                ],
            ]);
        } catch (\Exception $e) {
            $emailError = $e->getMessage();
            \Log::error('Erreur lors de l\'envoi de l\'email de contact', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'contact_id' => $contact->id,
            ]);
        }

        return response()->json([
            'message' => 'Votre message a été envoyé avec succès !',
            'data' => new ContactResource($contact),
        ], 201);
    }
}
