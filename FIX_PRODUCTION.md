# Solution : Les fichiers ne sont pas à jour sur le serveur

## Problème identifié

Les fichiers sur votre serveur de production ne contiennent pas les modifications car **les derniers commits n'ont pas été récupérés** avec `git pull`.

## Solution : Mettre à jour le serveur

### Sur le serveur de production, exécutez :

```bash
# 1. Aller dans le répertoire du projet
cd /chemin/vers/votre/projet

# 2. Vérifier l'état actuel
git status

# 3. Récupérer les derniers commits depuis GitHub
git pull origin main

# 4. Vérifier que les fichiers sont maintenant à jour
grep "contact@mkd-pro.com" resources/js/pages/Contact.vue
# Vous devriez maintenant voir le résultat

# 5. Builder les assets (IMPORTANT)
npm run build

# 6. Vider les caches Laravel
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 7. Optimiser
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Vérification étape par étape

### Étape 1 : Vérifier que Git est à jour

```bash
git log --oneline -3
```

Vous devriez voir :
```
1b19453 build prod
9a8a16a Mise à jour des informations de contact : email contact@mkd-pro.com et échange des numéros WhatsApp/téléphone
84addfc build prod
```

### Étape 2 : Vérifier les fichiers après git pull

```bash
# Vérifier Contact.vue
grep "contact@mkd-pro.com" resources/js/pages/Contact.vue
# Devrait afficher : contact@mkd-pro.com

# Vérifier Footer.vue
grep "221789267787" resources/js/components/Footer.vue
# Devrait afficher : https://wa.me/221789267787

# Vérifier ContactController.php
grep "contact@mkd-pro.com" app/Http/Controllers/Api/ContactController.php
# Devrait afficher : contact@mkd-pro.com
```

### Étape 3 : Builder les assets

**CRITIQUE** : Même après avoir récupéré les fichiers, il faut rebuilder les assets :

```bash
# Supprimer l'ancien build (optionnel mais recommandé)
rm -rf public/build/

# Builder les nouveaux assets
npm run build

# Vérifier que les fichiers sont créés
ls -la public/build/assets/
```

### Étape 4 : Vider tous les caches

```bash
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Si git pull ne fonctionne pas

### Vérifier la branche

```bash
git branch
# Devrait afficher : * main
```

### Vérifier le remote

```bash
git remote -v
# Devrait afficher votre dépôt GitHub
```

### Forcer la mise à jour

Si nécessaire :

```bash
git fetch origin
git reset --hard origin/main
```

⚠️ **Attention** : `git reset --hard` va écraser toutes les modifications locales non commitées.

## Script complet de déploiement

```bash
#!/bin/bash
set -e

echo "🚀 Déploiement MKD-pro..."

cd /chemin/vers/votre/projet

# Récupérer les modifications
echo "📥 Récupération depuis Git..."
git pull origin main

# Vérifier que les fichiers sont à jour
echo "✅ Vérification des fichiers..."
if grep -q "contact@mkd-pro.com" resources/js/pages/Contact.vue; then
    echo "✅ Fichiers à jour"
else
    echo "❌ Les fichiers ne sont pas à jour !"
    exit 1
fi

# Installer les dépendances
echo "📦 Installation des dépendances..."
composer install --no-dev --optimize-autoloader
npm install

# Builder les assets
echo "🔨 Build des assets..."
rm -rf public/build/
npm run build

# Vider les caches
echo "🧹 Nettoyage des caches..."
php artisan optimize:clear

# Optimiser
echo "⚡ Optimisation..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Déploiement terminé !"
```

## Vérification finale

Après avoir exécuté toutes les étapes :

1. **Vérifier les fichiers source** :
   ```bash
   grep "contact@mkd-pro.com" resources/js/pages/Contact.vue
   ```

2. **Vérifier les assets buildés** :
   ```bash
   ls -la public/build/assets/
   ```

3. **Tester dans le navigateur** :
   - Vider le cache du navigateur (Ctrl+Shift+R)
   - Vérifier que les nouveaux numéros s'affichent
   - Vérifier que l'email est `contact@mkd-pro.com`

## Résumé

Le problème était que **les fichiers sur le serveur n'étaient pas à jour avec Git**. 

**Solution** : Exécutez `git pull origin main` sur le serveur, puis `npm run build` pour compiler les assets.

