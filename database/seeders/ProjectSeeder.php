<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vider la table avant de remplir
        Project::truncate();

        // Projet 1 : Application de gestion de stock pour un grossiste à Dakar
        Project::create([
            'title' => 'Application de gestion de stock pour un grossiste à Dakar',
            'client' => 'Grossiste à Dakar',
            'description' => 'Solution complète de gestion de stock développée sur mesure pour un grossiste à Dakar. Application web responsive permettant une gestion optimale des produits, des ventes et des alertes en temps réel.',
            'features' => [
                'Suivi des produits',
                'Ventes journalières',
                'Alertes expiration de produits',
                'Alertes avis d\'échéance de facture',
                'Alertes stock faible',
                'Multi-utilisateur',
                'Interface simple téléphone/Tablette/PC',
            ],
            'image' => [
                'fr' => 'projects/videos/stock-vente-demo-fr.mp4',
                'wo' => 'projects/videos/stock-vente-demo-wo.mp4',
            ],
            'order' => 1,
        ]);

        // Projet 2 : Mini CRM pour PME
        Project::create([
            'title' => 'Mini CRM pour PME',
            'client' => 'PME Sénégalaise',
            'description' => 'Application CRM légère et intuitive spécialement conçue pour les PME sénégalaises. Gestion complète de la relation client, suivi des paiements et organisation de l\'agenda commercial.',
            'features' => [
                'Gestion clients',
                'Suivi paiements',
                'Agenda commercial',
            ],
            'image' => 'placeholder',
            'order' => 2,
        ]);
    }
}
