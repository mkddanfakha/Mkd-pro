<?php

namespace App\Console\Commands;

use App\Mail\ContactNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'test:email';
    protected $description = 'Test l\'envoi d\'email de contact';

    public function handle()
    {
        $this->info('Test d\'envoi d\'email...');
        
        $testData = [
            'name' => 'Test User',
            'phone' => '+221 78 926 77 87',
            'email' => 'test@example.com',
            'company' => 'Test Company',
            'message' => 'Ceci est un message de test pour vérifier l\'envoi d\'email.',
        ];

        try {
            Mail::to('dmohamedkounta@gmail.com')->send(
                new ContactNotification($testData)
            );
            $this->info('✅ Email envoyé avec succès !');
            $this->info('Vérifiez votre boîte de réception ou les logs.');
        } catch (\Exception $e) {
            $this->error('❌ Erreur lors de l\'envoi de l\'email:');
            $this->error($e->getMessage());
            $this->error('Trace: ' . $e->getTraceAsString());
        }
    }
}

