# SPA Vue.js MKD-pro - Documentation

Application Vue.js 3 premium pour le site MKD-pro, spécialisé dans la digitalisation des PME au Sénégal.

## Technologies utilisées

- **Vue.js 3** avec Composition API
- **Vue Router** pour la navigation
- **TailwindCSS** pour le styling
- **@vueuse/motion** pour les animations
- **Axios** pour les appels API

## Structure du projet

```
resources/js/
├── api/
│   ├── axios.js          # Configuration Axios
│   └── services.js       # Services API
├── components/
│   ├── Navbar.vue        # Navigation principale
│   └── Footer.vue        # Footer
├── layouts/
│   └── AppLayout.vue     # Layout principal avec transitions
├── pages/
│   ├── Home.vue          # Page d'accueil
│   ├── Services.vue      # Page services
│   ├── Portfolio.vue      # Page portfolio
│   ├── About.vue         # Page à propos
│   └── Contact.vue       # Page contact
├── router/
│   └── index.js          # Configuration Vue Router
└── app.js                # Point d'entrée Vue.js
```

## Installation et démarrage

1. **Installer les dépendances :**
```bash
npm install
```

2. **Démarrer le serveur de développement :**
```bash
npm run dev
```

3. **Dans un autre terminal, démarrer Laravel :**
```bash
php artisan serve
```

4. **Accéder à l'application :**
```
http://localhost:8000
```

## Pages disponibles

- `/` - Page d'accueil avec hero section, services, pourquoi choisir MKD-pro, exemple de projet
- `/services` - Liste complète des services
- `/portfolio` - Galerie de projets avec modal de détails
- `/about` - Présentation et valeurs
- `/contact` - Formulaire de contact avec validation

## Fonctionnalités

### Navigation
- Navbar sticky avec effet blur au scroll
- Animation de soulignement pour la page active
- Menu mobile responsive
- Transitions fluides entre les pages

### Animations
- Fade in/out pour les éléments
- Slide animations pour les sections
- Hover effects sur les cards
- Parallax léger dans le hero
- Stagger animations pour les listes

### API Integration
- Toutes les données proviennent de l'API Laravel
- Gestion des erreurs
- États de chargement
- Validation des formulaires

## Personnalisation

### Couleurs
La palette de couleurs utilise :
- Gris anthracite (`gray-900`, `gray-800`)
- Blanc (`white`, `gray-50`)
- Bleu roi (`blue-600`, `blue-800`)
- Vert pour WhatsApp (`green-500`)

### Animations
Les animations sont gérées via `@vueuse/motion` avec les directives :
- `v-motion-fade` - Fade in/out
- `v-motion-slide-left` - Slide depuis la gauche
- `v-motion-slide-right` - Slide depuis la droite
- `v-motion-slide-top` - Slide depuis le haut
- `v-motion-slide-bottom` - Slide depuis le bas
- `v-motion-scale` - Scale animation

## Build pour production

```bash
npm run build
```

Les assets seront compilés dans `public/build/`.

## Notes importantes

- L'application est une SPA complète, toutes les routes web pointent vers `app.blade.php`
- Les routes API sont séparées dans `routes/api.php`
- Le CORS peut être configuré dans `config/cors.php` si nécessaire
- Les transitions entre pages sont gérées par Vue Router avec le composant `<transition>`

