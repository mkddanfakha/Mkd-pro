# Guide de déploiement en production

## Étapes pour appliquer les changements en production

### 1. Se connecter au serveur de production (SSH)

```bash
ssh votre-utilisateur@votre-serveur.com
cd /chemin/vers/votre/projet
```

### 2. Récupérer les dernières modifications depuis Git

```bash
git pull origin main
```

### 3. Installer les dépendances (si nécessaire)

```bash
# Dépendances PHP
composer install --no-dev --optimize-autoloader

# Dépendances Node.js (si npm install n'a pas été fait)
npm install
```

### 4. Builder les assets frontend (IMPORTANT)

C'est l'étape la plus importante car les fichiers Vue.js ont été modifiés :

```bash
npm run build
```

Cette commande va créer les fichiers compilés dans `public/build/` qui sont nécessaires pour l'application.

### 5. Vider les caches Laravel

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

### 6. Optimiser l'application (optionnel mais recommandé)

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Vérifier les permissions

Assurez-vous que les fichiers sont accessibles :

```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 8. Redémarrer les services (si nécessaire)

Si vous utilisez PHP-FPM ou un serveur d'application :

```bash
# Pour PHP-FPM
sudo systemctl restart php8.2-fpm  # ou la version que vous utilisez

# Pour Nginx
sudo systemctl restart nginx
```

## Script de déploiement complet (à adapter selon votre configuration)

Vous pouvez créer un script `deploy.sh` :

```bash
#!/bin/bash

set -e

echo "🚀 Déploiement en cours..."

# Aller dans le répertoire du projet
cd /chemin/vers/votre/projet

# Récupérer les modifications
echo "📥 Récupération des modifications..."
git pull origin main

# Installer les dépendances
echo "📦 Installation des dépendances..."
composer install --no-dev --optimize-autoloader
npm install

# Builder les assets frontend
echo "🔨 Build des assets frontend..."
npm run build

# Vider les caches
echo "🧹 Nettoyage des caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Optimiser
echo "⚡ Optimisation..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Permissions
echo "🔐 Configuration des permissions..."
chmod -R 755 storage bootstrap/cache

echo "✅ Déploiement terminé !"
```

Rendez-le exécutable :
```bash
chmod +x deploy.sh
```

Puis exécutez-le :
```bash
./deploy.sh
```

## Vérification après déploiement

1. **Vérifier que les assets sont bien générés** :
   ```bash
   ls -la public/build/
   ```
   Vous devriez voir les fichiers `app-*.js` et `app-*.css`

2. **Tester l'application** :
   - Visitez votre site et vérifiez que les nouveaux numéros de téléphone/WhatsApp s'affichent correctement
   - Vérifiez que l'email de contact est bien `contact@mkd-pro.com`

3. **Vérifier la console du navigateur** :
   - Ouvrez les outils de développement (F12)
   - Vérifiez qu'il n'y a pas d'erreurs 404 pour les fichiers JS/CSS

## Problèmes courants

### Les changements ne s'affichent pas

1. **Vider le cache du navigateur** : Ctrl+Shift+R (ou Cmd+Shift+R sur Mac)
2. **Vérifier que les assets sont bien buildés** : `ls -la public/build/`
3. **Vérifier les permissions** : Les fichiers dans `public/build/` doivent être lisibles

### Erreur "Vite manifest not found"

Cela signifie que les assets n'ont pas été buildés. Exécutez :
```bash
npm run build
```

### Les fichiers JS/CSS ne se chargent pas

1. Vérifiez que le serveur web peut lire les fichiers dans `public/build/`
2. Vérifiez les permissions : `chmod -R 755 public/build/`
3. Vérifiez la configuration de votre serveur web (Nginx/Apache)

