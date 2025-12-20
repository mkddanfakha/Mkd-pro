#!/bin/bash

# Script de diagnostic pour vérifier pourquoi les changements ne s'appliquent pas
# Usage: ./diagnostic.sh

echo "🔍 Diagnostic MKD-pro - Changements non appliqués"
echo "=================================================="
echo ""

# 1. Vérifier Git
echo "1️⃣ État Git:"
echo "------------"
git status --short
echo ""
echo "Derniers commits:"
git log --oneline -5
echo ""

# 2. Vérifier les fichiers modifiés
echo "2️⃣ Fichiers modifiés dans le dernier commit:"
echo "--------------------------------------------"
git diff HEAD~1 --name-only 2>/dev/null | grep -E "(Contact|Footer|Home|MobileCallPrompt|WhatsAppButton|ContactController)" || echo "Aucun fichier trouvé"
echo ""

# 3. Vérifier le contenu des fichiers source
echo "3️⃣ Vérification du contenu des fichiers source:"
echo "-----------------------------------------------"
echo "Contact.vue - Email:"
grep -n "contact@mkd-pro.com" resources/js/pages/Contact.vue 2>/dev/null && echo "✅ Trouvé" || echo "❌ Non trouvé"
echo ""
echo "Contact.vue - WhatsApp:"
grep -n "221789267787" resources/js/pages/Contact.vue 2>/dev/null && echo "✅ Trouvé" || echo "❌ Non trouvé"
echo ""
echo "Footer.vue - Email:"
grep -n "contact@mkd-pro.com" resources/js/components/Footer.vue 2>/dev/null && echo "✅ Trouvé" || echo "❌ Non trouvé"
echo ""
echo "ContactController.php - Email:"
grep -n "contact@mkd-pro.com" app/Http/Controllers/Api/ContactController.php 2>/dev/null && echo "✅ Trouvé" || echo "❌ Non trouvé"
echo ""

# 4. Vérifier les assets buildés
echo "4️⃣ Vérification des assets buildés:"
echo "------------------------------------"
if [ -d "public/build" ]; then
    echo "✅ Dossier public/build/ existe"
    echo ""
    echo "Fichiers dans public/build/assets/:"
    ls -lah public/build/assets/ 2>/dev/null | head -10 || echo "Aucun fichier trouvé"
    echo ""
    echo "Date de modification du dernier fichier JS:"
    ls -lt public/build/assets/*.js 2>/dev/null | head -1 || echo "Aucun fichier JS trouvé"
    echo ""
    echo "Date de modification du dernier fichier CSS:"
    ls -lt public/build/assets/*.css 2>/dev/null | head -1 || echo "Aucun fichier CSS trouvé"
else
    echo "❌ Dossier public/build/ n'existe pas - Les assets n'ont pas été buildés !"
fi
echo ""

# 5. Vérifier le manifest Vite
echo "5️⃣ Vérification du manifest Vite:"
echo "----------------------------------"
if [ -f "public/build/.vite/manifest.json" ]; then
    echo "✅ Manifest trouvé"
    echo ""
    echo "Premières lignes du manifest:"
    head -20 public/build/.vite/manifest.json
else
    echo "❌ Manifest non trouvé - Les assets n'ont pas été buildés correctement !"
fi
echo ""

# 6. Comparer les dates
echo "6️⃣ Comparaison des dates (source vs buildé):"
echo "--------------------------------------------"
if [ -f "resources/js/pages/Contact.vue" ] && [ -f "public/build/assets/app-"*.js ]; then
    SOURCE_DATE=$(stat -c %Y resources/js/pages/Contact.vue 2>/dev/null || stat -f %m resources/js/pages/Contact.vue 2>/dev/null)
    BUILD_DATE=$(stat -c %Y public/build/assets/app-*.js 2>/dev/null | head -1 || stat -f %m public/build/assets/app-*.js 2>/dev/null | head -1)
    
    if [ -n "$SOURCE_DATE" ] && [ -n "$BUILD_DATE" ]; then
        if [ "$SOURCE_DATE" -gt "$BUILD_DATE" ]; then
            echo "⚠️  Les fichiers source sont plus récents que les fichiers buildés !"
            echo "   Il faut rebuilder avec: npm run build"
        else
            echo "✅ Les fichiers buildés sont à jour"
        fi
    fi
else
    echo "⚠️  Impossible de comparer les dates"
fi
echo ""

# 7. Vérifier Node.js et npm
echo "7️⃣ Versions Node.js et npm:"
echo "---------------------------"
node --version 2>/dev/null || echo "❌ Node.js non installé"
npm --version 2>/dev/null || echo "❌ npm non installé"
echo ""

# 8. Vérifier les permissions
echo "8️⃣ Permissions:"
echo "---------------"
if [ -d "public/build" ]; then
    ls -ld public/build/
    echo ""
    echo "Permissions des fichiers dans public/build/assets/:"
    ls -l public/build/assets/ 2>/dev/null | head -5
else
    echo "⚠️  Dossier public/build/ n'existe pas"
fi
echo ""

# 9. Vérifier la configuration
echo "9️⃣ Configuration:"
echo "-----------------"
if [ -f ".env" ]; then
    echo "APP_ENV: $(grep APP_ENV .env | cut -d '=' -f2)"
    echo "APP_DEBUG: $(grep APP_DEBUG .env | cut -d '=' -f2)"
else
    echo "⚠️  Fichier .env non trouvé"
fi
echo ""

# 10. Résumé et recommandations
echo "📋 Résumé et recommandations:"
echo "============================="
echo ""

if [ ! -d "public/build" ]; then
    echo "❌ CRITIQUE: Les assets n'ont pas été buildés"
    echo "   → Exécutez: npm run build"
    echo ""
fi

if [ -d "public/build" ] && [ -f "resources/js/pages/Contact.vue" ]; then
    SOURCE_DATE=$(stat -c %Y resources/js/pages/Contact.vue 2>/dev/null || stat -f %m resources/js/pages/Contact.vue 2>/dev/null)
    BUILD_DATE=$(stat -c %Y public/build/assets/app-*.js 2>/dev/null | head -1 || stat -f %m public/build/assets/app-*.js 2>/dev/null | head -1)
    
    if [ -n "$SOURCE_DATE" ] && [ -n "$BUILD_DATE" ] && [ "$SOURCE_DATE" -gt "$BUILD_DATE" ]; then
        echo "⚠️  Les fichiers source sont plus récents que les fichiers buildés"
        echo "   → Exécutez: npm run build"
        echo ""
    fi
fi

echo "✅ Si tous les fichiers source contiennent les bonnes valeurs mais que"
echo "   les changements ne s'affichent pas dans le navigateur:"
echo "   1. Videz le cache du navigateur (Ctrl+Shift+R)"
echo "   2. Testez en navigation privée"
echo "   3. Vérifiez la console du navigateur (F12) pour les erreurs"
echo ""

