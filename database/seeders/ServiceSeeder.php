<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vider la table avant de remplir
        Service::truncate();

        // Services proposés (category: proposition)
        $propositions = [
            [
                'title' => 'Développement d\'applications métiers',
                'description' => 'Gestion de stock, vente, caisse, CRM et bien plus encore.',
                'icon' => 'document-text',
                'category' => 'proposition',
                'order' => 1,
            ],
            [
                'title' => 'Automatisation des processus',
                'description' => 'Simplifiez vos tâches répétitives et gagnez en efficacité.',
                'icon' => 'bolt',
                'category' => 'proposition',
                'order' => 2,
            ],
            [
                'title' => 'Modernisation digitale',
                'description' => 'Transformez votre entreprise avec les dernières technologies.',
                'icon' => 'sparkles',
                'category' => 'proposition',
                'order' => 3,
            ],
            [
                'title' => 'Sites web professionnels & e-commerce',
                'description' => 'Présence en ligne moderne et vente en ligne.',
                'icon' => 'globe-alt',
                'category' => 'proposition',
                'order' => 4,
            ],
            [
                'title' => 'Accompagnement personnalisé',
                'description' => 'Un suivi dédié pour votre réussite digitale.',
                'icon' => 'user-group',
                'category' => 'proposition',
                'order' => 5,
            ],
        ];

        // Pourquoi travailler avec moi (category: why)
        $why = [
            [
                'title' => 'Solutions adaptées au marché sénégalais',
                'description' => 'Des outils conçus pour répondre aux spécificités locales.',
                'icon' => 'check-circle',
                'category' => 'why',
                'order' => 1,
            ],
            [
                'title' => 'Expérience avec des commerçants et PME locales',
                'description' => 'Une connaissance approfondie des besoins réels des entreprises.',
                'icon' => 'check-circle',
                'category' => 'why',
                'order' => 2,
            ],
            [
                'title' => 'Tarifs accessibles',
                'description' => 'Des solutions à prix compétitifs pour les PME.',
                'icon' => 'check-circle',
                'category' => 'why',
                'order' => 3,
            ],
            [
                'title' => 'Applications simples et intuitives',
                'description' => 'Faciles à utiliser, même sans compétences techniques.',
                'icon' => 'check-circle',
                'category' => 'why',
                'order' => 4,
            ],
            [
                'title' => 'Support WhatsApp',
                'description' => 'Assistance rapide et directe via WhatsApp.',
                'icon' => 'check-circle',
                'category' => 'why',
                'order' => 5,
            ],
        ];

        // Services détaillés (category: service) - Nouveaux contenus avec icônes différentes
        $services = [
            [
                'title' => 'Développement d\'applications métiers',
                'description' => 'Applications sur mesure développées avec Laravel + Vue pour répondre à vos besoins spécifiques de gestion.',
                'icon' => 'code',
                'category' => 'service',
                'order' => 1,
            ],
            [
                'title' => 'Création de sites web professionnels',
                'description' => 'Sites web modernes et performants pour renforcer votre présence en ligne et attirer de nouveaux clients.',
                'icon' => 'computer-desktop',
                'category' => 'service',
                'order' => 2,
            ],
            [
                'title' => 'Automatisation & Digitalisation',
                'description' => 'Transformation digitale de vos processus métiers pour gagner en efficacité et réduire les erreurs.',
                'icon' => 'cog',
                'category' => 'service',
                'order' => 3,
            ],
            [
                'title' => 'Accompagnement digital',
                'description' => 'Formation, support et suivi personnalisé pour garantir la réussite de votre transformation digitale.',
                'icon' => 'academic-cap',
                'category' => 'service',
                'order' => 4,
            ],
        ];

        foreach (array_merge($propositions, $why, $services) as $service) {
            Service::create($service);
        }
    }
}
