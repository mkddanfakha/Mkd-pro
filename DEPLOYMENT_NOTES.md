# Notes de déploiement

## Mise à jour de la base de données en production

Après avoir déployé les modifications, assurez-vous de mettre à jour la base de données :

### Option 1 : Utiliser le seeder (recommandé)

```bash
php artisan db:seed --class=ProjectSeeder --force
```

⚠️ **Attention** : Cela va **vider** la table `projects` avant de la remplir. Si vous avez des projets personnalisés, sauvegardez-les d'abord.

### Option 2 : Mise à jour manuelle via SQL

Si vous voulez mettre à jour uniquement le projet existant sans tout vider :

```sql
UPDATE projects 
SET image = '{"fr":"projects\/videos\/stock-vente-demo-fr.mp4","wo":"projects\/videos\/stock-vente-demo-wo.mp4"}' 
WHERE title = 'Application de gestion de stock pour un grossiste à Dakar';
```

### Option 3 : Mise à jour via Tinker

```bash
php artisan tinker
```

Puis dans Tinker :
```php
$project = App\Models\Project::where('title', 'Application de gestion de stock pour un grossiste à Dakar')->first();
$project->image = [
    'fr' => 'projects/videos/stock-vente-demo-fr.mp4',
    'wo' => 'projects/videos/stock-vente-demo-wo.mp4'
];
$project->save();
```

## Vérification après mise à jour

1. Vérifiez que les vidéos sont accessibles :
   - `https://votre-domaine.com/projects/videos/stock-vente-demo-fr.mp4`
   - `https://votre-domaine.com/projects/videos/stock-vente-demo-wo.mp4`

2. Testez l'API :
   ```
   https://votre-domaine.com/api/v1/portfolio
   ```
   Le champ `image` doit être un objet JSON, pas une chaîne.

3. Testez l'affichage dans le portfolio :
   - La vidéo française doit s'afficher dans la grille
   - Le sélecteur de langue doit apparaître dans le modal
   - Les deux vidéos doivent être accessibles via le sélecteur


