# Configuration Email - MKD-pro

## Problème : Les emails ne sont pas reçus

### Vérifications à faire :

1. **Vérifier la configuration dans `.env`** :
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@gmail.com
MAIL_PASSWORD=votre-mot-de-passe-app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@mkd-pro.com
MAIL_FROM_NAME="MKD-pro"
```

2. **Pour Gmail, vous devez** :
   - Activer l'authentification à deux facteurs sur votre compte Gmail
   - Générer un "Mot de passe d'application" (pas votre mot de passe normal)
   - Utiliser ce mot de passe d'application dans `MAIL_PASSWORD`

3. **Vérifier les logs** :
   - Regardez dans `storage/logs/laravel.log` pour voir les erreurs
   - Cherchez "Email de contact envoyé" ou "Erreur lors de l'envoi"

4. **Tester l'envoi** :
```bash
php artisan test:email
```

5. **Vérifier les spams** :
   - Les emails peuvent aller dans le dossier spam
   - Vérifiez aussi les filtres Gmail

6. **Mode développement (pour tester sans SMTP)** :
```env
MAIL_MAILER=log
```
Les emails seront alors écrits dans `storage/logs/laravel.log`

### Si ça ne fonctionne toujours pas :

1. Vérifiez que le serveur peut se connecter à smtp.gmail.com (port 587)
2. Vérifiez que les identifiants sont corrects
3. Essayez avec un autre service email (Mailgun, SendGrid, etc.)

