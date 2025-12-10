import { createRouter, createWebHistory } from 'vue-router';
import Home from '../pages/Home.vue';
import Services from '../pages/Services.vue';
import Portfolio from '../pages/Portfolio.vue';
import About from '../pages/About.vue';
import Contact from '../pages/Contact.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            title: 'MKD-pro - Digitalisation sur mesure pour les PME du Sénégal',
            description: 'Optimisez votre activité, gagnez du temps et modernisez votre gestion. Applications métiers, sites web, automatisation pour les PME sénégalaises.',
            keywords: 'digitalisation PME Sénégal, applications métiers, Laravel Vue.js, automatisation, sites web professionnels',
        },
    },
    {
        path: '/services',
        name: 'services',
        component: Services,
        meta: {
            title: 'Services - MKD-pro | Digitalisation PME Sénégal',
            description: 'Découvrez nos services de digitalisation : développement d\'applications métiers (Laravel + Vue), création de sites web, automatisation et accompagnement digital.',
            keywords: 'services digitalisation, applications métiers, sites web, automatisation, accompagnement digital Sénégal',
        },
    },
    {
        path: '/portfolio',
        name: 'portfolio',
        component: Portfolio,
        meta: {
            title: 'Réalisations - MKD-pro | Projets de digitalisation PME Sénégal',
            description: 'Découvrez nos réalisations : applications de gestion de stock, CRM pour PME, solutions digitales sur mesure pour les entreprises sénégalaises.',
            keywords: 'portfolio digitalisation, projets réalisés, applications gestion stock, CRM PME Sénégal',
        },
    },
    {
        path: '/about',
        name: 'about',
        component: About,
        meta: {
            title: 'À propos - MKD-pro | Développeur web spécialisé PME Sénégal',
            description: 'Développeur web spécialisé en digitalisation des PME du Sénégal. Expert Laravel, Vue.js et outils d\'IA type Cursor.',
            keywords: 'à propos MKD-pro, développeur web Sénégal, expert Laravel Vue.js, digitalisation PME',
        },
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact,
        meta: {
            title: 'Contact - MKD-pro | Discutons de votre projet de digitalisation',
            description: 'Contactez MKD-pro pour discuter de votre projet de digitalisation. WhatsApp, téléphone, email. Réponse rapide garantie.',
            keywords: 'contact MKD-pro, devis digitalisation, WhatsApp Sénégal, projet digitalisation PME',
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { top: 0 };
        }
    },
});

// Update meta tags on route change
router.beforeEach((to, from, next) => {
    // Update document title
    if (to.meta?.title) {
        document.title = to.meta.title;
    } else {
        document.title = 'MKD-pro - Digitalisation PME Sénégal';
    }

    // Update meta description
    let metaDescription = document.querySelector('meta[name="description"]');
    if (!metaDescription) {
        metaDescription = document.createElement('meta');
        metaDescription.setAttribute('name', 'description');
        document.head.appendChild(metaDescription);
    }
    metaDescription.setAttribute('content', to.meta?.description || 'Digitalisation sur mesure pour les PME du Sénégal');

    // Update meta keywords
    let metaKeywords = document.querySelector('meta[name="keywords"]');
    if (!metaKeywords) {
        metaKeywords = document.createElement('meta');
        metaKeywords.setAttribute('name', 'keywords');
        document.head.appendChild(metaKeywords);
    }
    metaKeywords.setAttribute('content', to.meta?.keywords || 'digitalisation PME Sénégal');

    // Update Open Graph tags
    let ogTitle = document.querySelector('meta[property="og:title"]');
    if (!ogTitle) {
        ogTitle = document.createElement('meta');
        ogTitle.setAttribute('property', 'og:title');
        document.head.appendChild(ogTitle);
    }
    ogTitle.setAttribute('content', to.meta?.title || document.title);

    let ogDescription = document.querySelector('meta[property="og:description"]');
    if (!ogDescription) {
        ogDescription = document.createElement('meta');
        ogDescription.setAttribute('property', 'og:description');
        document.head.appendChild(ogDescription);
    }
    ogDescription.setAttribute('content', to.meta?.description || metaDescription.getAttribute('content'));

    let ogUrl = document.querySelector('meta[property="og:url"]');
    if (!ogUrl) {
        ogUrl = document.createElement('meta');
        ogUrl.setAttribute('property', 'og:url');
        document.head.appendChild(ogUrl);
    }
    ogUrl.setAttribute('content', window.location.origin + to.fullPath);

    // Update Twitter URL
    let twitterUrl = document.querySelector('meta[name="twitter:url"]');
    if (!twitterUrl) {
        twitterUrl = document.createElement('meta');
        twitterUrl.setAttribute('name', 'twitter:url');
        document.head.appendChild(twitterUrl);
    }
    twitterUrl.setAttribute('content', window.location.origin + to.fullPath);

    // Update canonical URL
    let canonical = document.querySelector('link[rel="canonical"]');
    if (!canonical) {
        canonical = document.createElement('link');
        canonical.setAttribute('rel', 'canonical');
        document.head.appendChild(canonical);
    }
    canonical.setAttribute('href', window.location.origin + to.fullPath);

    next();
});

export default router;

