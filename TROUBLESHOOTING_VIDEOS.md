# Dépannage : Vidéos non affichées en production

## Vérifications à faire

### 1. Vérifier que les vidéos sont bien sur le serveur

Connectez-vous en SSH et vérifiez :
```bash
ls -la public/projects/videos/
```

Vous devriez voir :
- `stock-vente-demo-fr.mp4`
- `stock-vente-demo-wo.mp4`

### 2. Vérifier les permissions des fichiers

Les fichiers doivent être lisibles par le serveur web :
```bash
chmod 644 public/projects/videos/*.mp4
chmod 755 public/projects/videos/
```

### 3. Vérifier la base de données

Connectez-vous à la base de données et vérifiez le champ `image` du projet :

```sql
SELECT id, title, image FROM projects WHERE id = 1;
```

Le champ `image` devrait contenir un JSON comme :
```json
{"fr":"projects/videos/stock-vente-demo-fr.mp4","wo":"projects/videos/stock-vente-demo-wo.mp4"}
```

Si c'est une chaîne JSON au lieu d'un objet, le code devrait maintenant le gérer automatiquement.

### 4. Vérifier l'API

Testez l'endpoint API directement :
```
https://votre-domaine.com/api/v1/portfolio
```

Vérifiez que le champ `image` est bien un objet JSON et non une chaîne.

### 5. Vérifier la console du navigateur

Ouvrez la console du navigateur (F12) et regardez :
- Les erreurs 404 pour les vidéos
- Les logs de debug qui affichent la structure des projets

### 6. Vérifier les chemins des vidéos

Testez directement l'URL de la vidéo :
```
https://votre-domaine.com/projects/videos/stock-vente-demo-fr.mp4
```

Si vous obtenez une erreur 404, le problème vient du serveur web ou des permissions.

### 7. Vérifier la configuration du serveur web

Assurez-vous que votre serveur web (Apache/Nginx) sert correctement les fichiers `.mp4`.

Pour Nginx, ajoutez dans la configuration :
```nginx
location ~* \.(mp4|webm|ogg)$ {
    add_header Cache-Control "public, max-age=31536000";
}
```

## Solutions appliquées

1. **Décodage automatique des chaînes JSON** : Le contrôleur API décode maintenant les chaînes JSON si nécessaire
2. **Parsing côté client** : Les fonctions JavaScript parsent maintenant les chaînes JSON si elles sont reçues
3. **Logs de debug** : Des logs ont été ajoutés pour diagnostiquer le problème

## Si le problème persiste

1. Vérifiez les logs Laravel : `storage/logs/laravel.log`
2. Vérifiez les logs du serveur web (Apache/Nginx)
3. Vérifiez que les vidéos ne sont pas trop lourdes (> 10MB peut causer des problèmes)
4. Vérifiez que le type MIME est correct pour les fichiers MP4


