# Résolution du conflit Git avec les fichiers vidéo

## Problème

Git refuse de faire le pull car les fichiers vidéo ont été modifiés localement et seraient écrasés.

## Solutions possibles

### Option 1 : Sauvegarder les modifications locales puis pull (Recommandé)

```bash
# 1. Sauvegarder les modifications locales dans un stash
git stash push -m "Sauvegarde des vidéos avant pull" public/projects/videos/

# 2. Faire le pull
git pull origin main

# 3. Vérifier si les vidéos dans Git sont correctes
ls -la public/projects/videos/

# 4. Si vous avez besoin de récupérer vos modifications locales :
git stash pop
```

### Option 2 : Écraser les modifications locales (si les vidéos sur le serveur ne sont pas importantes)

```bash
# 1. Supprimer les modifications locales
git checkout -- public/projects/videos/stock-vente-demo-fr.mp4
git checkout -- public/projects/videos/stock-vente-demo-wo.mp4

# 2. Faire le pull
git pull origin main
```

### Option 3 : Ajouter les vidéos au .gitignore et forcer le pull

Si les vidéos ne doivent pas être versionnées dans Git :

```bash
# 1. Ajouter les vidéos au .gitignore (si ce n'est pas déjà fait)
echo "public/projects/videos/*.mp4" >> .gitignore

# 2. Supprimer les fichiers du suivi Git (mais les garder sur le disque)
git rm --cached public/projects/videos/stock-vente-demo-fr.mp4
git rm --cached public/projects/videos/stock-vente-demo-wo.mp4

# 3. Commit cette modification
git commit -m "Retirer les vidéos du suivi Git"

# 4. Faire le pull
git pull origin main
```

### Option 4 : Forcer le pull en écrasant les modifications locales

⚠️ **Attention** : Cela va écraser vos modifications locales sur les vidéos.

```bash
# 1. Forcer le reset vers la version distante
git fetch origin
git reset --hard origin/main

# ⚠️ Cela va écraser toutes les modifications locales non commitées
```

## Solution recommandée : Option 1 (Stash)

C'est la solution la plus sûre car elle préserve vos modifications locales :

```bash
# Sur le serveur de production
cd /chemin/vers/votre/projet

# 1. Sauvegarder les modifications locales
git stash push -m "Sauvegarde vidéos avant pull" public/projects/videos/

# 2. Faire le pull
git pull origin main

# 3. Vérifier que les fichiers source sont maintenant à jour
grep "contact@mkd-pro.com" resources/js/pages/Contact.vue
# Devrait maintenant fonctionner ✅

# 4. Builder les assets
npm run build

# 5. Vider les caches
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Si vous avez besoin de récupérer vos modifications locales sur les vidéos :
# git stash pop
```

## Vérification après résolution

Après avoir résolu le conflit et fait le pull :

```bash
# Vérifier que les fichiers sont à jour
grep "contact@mkd-pro.com" resources/js/pages/Contact.vue
grep "221789267787" resources/js/components/Footer.vue
grep "contact@mkd-pro.com" app/Http/Controllers/Api/ContactController.php

# Vérifier les derniers commits
git log --oneline -3
```

## Note importante sur les fichiers vidéo

Les fichiers vidéo (`*.mp4`) sont généralement trop volumineux pour être versionnés dans Git. Il serait préférable de :

1. Les ajouter au `.gitignore`
2. Les télécharger manuellement sur le serveur
3. Ne pas les versionner dans Git

Si vous voulez les retirer complètement de Git :

```bash
# Ajouter au .gitignore
echo "public/projects/videos/*.mp4" >> .gitignore

# Retirer du suivi Git
git rm --cached public/projects/videos/*.mp4

# Commit
git commit -m "Retirer les vidéos du suivi Git"

# Push
git push origin main
```

Ensuite, téléchargez les vidéos directement sur le serveur via FTP/SCP.

