# Diagnostic - Changements non appliqués en production

## Vérifications étape par étape

### 1. Vérifier que les fichiers sont bien sur le serveur

Connectez-vous en SSH et vérifiez que les fichiers modifiés sont bien présents :

```bash
# Vérifier les fichiers Vue.js modifiés
grep -r "contact@mkd-pro.com" resources/js/
grep -r "221789267787" resources/js/
grep -r "33665411064" resources/js/components/MobileCallPrompt.vue

# Vérifier le contrôleur PHP
grep -r "contact@mkd-pro.com" app/Http/Controllers/
```

Si ces commandes ne retournent rien, les fichiers n'ont pas été déployés.

### 2. Vérifier que les assets sont buildés

```bash
# Vérifier que le dossier build existe
ls -la public/build/

# Vérifier la date de modification des fichiers
ls -lt public/build/assets/ | head -5
```

Les fichiers doivent être récents (datés d'aujourd'hui si vous venez de builder).

### 3. Vérifier le manifest Vite

```bash
cat public/build/.vite/manifest.json
```

Le manifest doit contenir les références aux fichiers `app.js` et `app.css`.

### 4. Vérifier que le build a bien été fait

```bash
# Vérifier si les fichiers source sont plus récents que les fichiers buildés
stat resources/js/pages/Contact.vue
stat public/build/assets/app-*.js
```

Si les fichiers source sont plus récents que les fichiers buildés, il faut rebuilder.

### 5. Vérifier le cache du navigateur

**Important** : Même si les fichiers sont à jour sur le serveur, le navigateur peut utiliser une version en cache.

**Solutions** :
1. Vider complètement le cache du navigateur
2. Utiliser le mode navigation privée
3. Ajouter un paramètre de version dans l'URL pour forcer le rechargement

### 6. Vérifier les erreurs dans la console du navigateur

Ouvrez la console (F12) et vérifiez :
- Erreurs 404 pour les fichiers JS/CSS
- Erreurs de chargement de modules
- Messages d'erreur JavaScript

### 7. Vérifier que Vite est en mode production

Dans `vite.config.js`, vérifiez qu'il n'y a pas de configuration spécifique au développement qui pourrait interférer.

### 8. Vérifier les logs Laravel

```bash
tail -f storage/logs/laravel.log
```

Cherchez les erreurs liées au chargement des assets.

## Solutions possibles

### Solution 1 : Forcer un rebuild complet

```bash
# Supprimer l'ancien build
rm -rf public/build/

# Rebuilder
npm run build

# Vérifier
ls -la public/build/
```

### Solution 2 : Vérifier la configuration Vite

Assurez-vous que `vite.config.js` est correct et que le mode production est bien utilisé :

```bash
# Builder explicitement en mode production
NODE_ENV=production npm run build
```

### Solution 3 : Vérifier les permissions

```bash
# Donner les bonnes permissions
chmod -R 755 public/build/
chown -R www-data:www-data public/build/
```

### Solution 4 : Vérifier que le serveur web sert bien les fichiers

Testez directement l'URL d'un fichier buildé :
```
https://votre-domaine.com/build/assets/app-XXXXX.js
```

Si vous obtenez une 404, le problème vient de la configuration du serveur web.

### Solution 5 : Vérifier le fichier app.blade.php

Vérifiez que `resources/views/app.blade.php` charge bien les assets avec `@vite()` :

```php
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

### Solution 6 : Vérifier la variable d'environnement

Vérifiez que `APP_ENV=production` dans le fichier `.env` de production.

## Commandes de diagnostic complètes

Exécutez ces commandes sur le serveur de production et partagez les résultats :

```bash
# 1. Vérifier Git
echo "=== État Git ==="
git status
git log --oneline -5

# 2. Vérifier les fichiers modifiés
echo "=== Fichiers modifiés ==="
git diff HEAD~1 --name-only | grep -E "(Contact|Footer|Home|MobileCallPrompt|WhatsAppButton|ContactController)"

# 3. Vérifier les assets
echo "=== Assets buildés ==="
ls -lah public/build/assets/ 2>/dev/null || echo "Dossier build/ non trouvé"

# 4. Vérifier le manifest
echo "=== Manifest Vite ==="
cat public/build/.vite/manifest.json 2>/dev/null | head -20 || echo "Manifest non trouvé"

# 5. Vérifier Node.js et npm
echo "=== Versions Node.js/npm ==="
node --version
npm --version

# 6. Vérifier les permissions
echo "=== Permissions ==="
ls -ld public/build/ 2>/dev/null || echo "Dossier build/ non trouvé"

# 7. Vérifier les fichiers source
echo "=== Fichiers source (Contact.vue) ==="
grep -n "contact@mkd-pro.com" resources/js/pages/Contact.vue 2>/dev/null || echo "Fichier non trouvé"
```

## Test rapide

Pour tester rapidement si les changements sont bien dans les fichiers source :

```bash
# Sur le serveur de production
cd /chemin/vers/votre/projet
grep "contact@mkd-pro.com" resources/js/pages/Contact.vue
grep "221789267787" resources/js/components/Footer.vue
```

Si ces commandes ne retournent rien, les fichiers n'ont pas été déployés depuis Git.

