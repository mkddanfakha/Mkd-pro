#!/bin/bash

# Script de déploiement pour MKD-pro
# Usage: ./deploy.sh

set -e  # Arrêter en cas d'erreur

echo "🚀 Déploiement MKD-pro en cours..."

# Récupérer les modifications depuis Git
echo "📥 Récupération des modifications depuis Git..."
git pull origin main

# Installer les dépendances PHP
echo "📦 Installation des dépendances PHP..."
composer install --no-dev --optimize-autoloader

# Installer les dépendances Node.js
echo "📦 Installation des dépendances Node.js..."
npm install

# Builder les assets frontend (CRITIQUE pour les changements Vue.js)
echo "🔨 Build des assets frontend (Vite)..."
npm run build

# Vider tous les caches Laravel
echo "🧹 Nettoyage des caches Laravel..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

# Optimiser l'application pour la production
echo "⚡ Optimisation pour la production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Vérifier les permissions
echo "🔐 Vérification des permissions..."
chmod -R 755 storage bootstrap/cache
chmod -R 755 public/build

echo ""
echo "✅ Déploiement terminé avec succès !"
echo ""
echo "📋 Vérifications à faire :"
echo "   1. Vérifiez que les fichiers sont dans public/build/"
echo "   2. Testez l'application dans le navigateur"
echo "   3. Videz le cache du navigateur (Ctrl+Shift+R)"
echo ""

