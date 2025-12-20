# API MKD-pro - Documentation

API Laravel moderne pour le site professionnel MKD-pro spécialisé dans la digitalisation des PME au Sénégal.

## Base URL

```
http://localhost:8000/api/v1
```

## Endpoints

### 1. Page d'accueil

**GET** `/api/v1/home`

Retourne toutes les données nécessaires pour la page d'accueil.

**Réponse :**
```json
{
  "hero": {
    "title": "Digitalisation sur mesure pour les PME du Sénégal",
    "subtitle": "Optimisez votre activité...",
    "cta": {
      "demo": {
        "text": "Demander une démo",
        "link": "/contact"
      },
      "whatsapp": {
        "text": "Contact WhatsApp",
        "link": "https://wa.me/221789267787"
      }
    }
  },
  "services": {
    "title": "Ce que je propose",
    "items": [...]
  },
  "why": {
    "title": "Pourquoi travailler avec moi ?",
    "items": [...]
  },
  "project_example": {
    "title": "Exemple de projet",
    "project": {...}
  }
}
```

### 2. Services

**GET** `/api/v1/services`

Liste tous les services disponibles.

**GET** `/api/v1/services/{id}`

Affiche un service spécifique.

**Réponse :**
```json
{
  "id": 1,
  "title": "Développement d'applications métiers",
  "description": "Gestion de stock, vente, caisse, CRM...",
  "icon": "document-text",
  "category": "service",
  "order": 1
}
```

### 3. Portfolio

**GET** `/api/v1/portfolio`

Liste tous les projets réalisés.

**GET** `/api/v1/portfolio/{id}`

Affiche un projet spécifique.

**Réponse :**
```json
{
  "id": 1,
  "title": "Application de gestion de stock & vente pour un grossiste à Dakar",
  "client": "Grossiste à Dakar",
  "description": "Solution complète...",
  "features": [
    "Réduction des erreurs",
    "Entrées/sorties automatisées",
    "Alertes stock faible",
    "Rapports journaliers"
  ],
  "image": null,
  "order": 1
}
```

### 4. À propos

**GET** `/api/v1/about`

Retourne les informations de présentation.

**Réponse :**
```json
{
  "title": "À propos de moi",
  "content": "Je suis développeur web spécialisé en Laravel, Vue.js et Cursor.",
  "mission": "Ma mission : digitaliser les PME sénégalaises...",
  "values": [
    {
      "name": "Simplicité",
      "description": "Des solutions faciles à utiliser..."
    },
    ...
  ]
}
```

### 5. Contact

**POST** `/api/v1/contact`

Envoie un message de contact.

**Body :**
```json
{
  "name": "John Doe",
  "phone": "+33 6 65 41 10 64",
  "email": "john@example.com",
  "company": "Mon Entreprise",
  "message": "Bonjour, je souhaite..."
}
```

**Réponse (201) :**
```json
{
  "message": "Votre message a été envoyé avec succès !",
  "data": {
    "id": 1,
    "name": "John Doe",
    "phone": "+33 6 65 41 10 64",
    "email": "john@example.com",
    "company": "Mon Entreprise",
    "message": "Bonjour, je souhaite...",
    "read": false,
    "created_at": "2025-12-10 12:00:00"
  }
}
```

## Installation et utilisation

1. **Migrer la base de données :**
```bash
php artisan migrate
```

2. **Seeder les données :**
```bash
php artisan db:seed
```

3. **Tester l'API :**
```bash
# Page d'accueil
curl http://localhost:8000/api/v1/home

# Services
curl http://localhost:8000/api/v1/services

# Portfolio
curl http://localhost:8000/api/v1/portfolio

# À propos
curl http://localhost:8000/api/v1/about

# Contact (POST)
curl -X POST http://localhost:8000/api/v1/contact \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "phone": "+33 6 65 41 10 64",
    "email": "john@example.com",
    "message": "Bonjour, je souhaite discuter de mon projet."
  }'
```

## Structure des données

### Service
- `id` : Identifiant unique
- `title` : Titre du service
- `description` : Description du service
- `icon` : Nom de l'icône
- `category` : Catégorie (proposition, why, service)
- `order` : Ordre d'affichage

### Project
- `id` : Identifiant unique
- `title` : Titre du projet
- `client` : Nom du client
- `description` : Description du projet
- `features` : Tableau de fonctionnalités
- `image` : URL de l'image
- `order` : Ordre d'affichage

### Contact
- `id` : Identifiant unique
- `name` : Nom du contact
- `phone` : Téléphone
- `email` : Email (optionnel)
- `company` : Entreprise (optionnel)
- `message` : Message
- `read` : Statut de lecture
- `created_at` : Date de création

## Notes

- Toutes les routes sont publiques (pas d'authentification requise)
- Les réponses sont au format JSON
- Les erreurs suivent le format standard Laravel
- CORS peut être configuré dans `config/cors.php` si nécessaire

