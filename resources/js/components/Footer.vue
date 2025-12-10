<template>
    <footer class="bg-[#0A0A0A] border-t border-white/10 mt-20 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-96 h-96 bg-[#005BFF] rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#005BFF] rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Logo & Description -->
                <div v-motion-fade>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="logo-container relative">
                            <img
                                :src="logoPath"
                                alt="MKD-pro Logo"
                                class="w-16 h-16 logo-glow object-contain"
                            />
                        </div>
                        <span class="text-xl font-bold text-white">MKD-pro</span>
                    </div>
                    <p class="text-white/60 text-sm leading-relaxed">
                        Digitalisation et solutions métiers adaptées aux PME sénégalaises.
                    </p>
                </div>

                <!-- Quick Links -->
                <div v-motion-fade :delay="100">
                    <h3 class="text-lg font-semibold mb-6 text-white">Liens rapides</h3>
                    <ul class="space-y-3">
                        <li v-for="link in links" :key="link.name">
                            <router-link
                                :to="link.path"
                                class="text-white/60 hover:text-[#005BFF] transition-colors text-sm uppercase tracking-wider"
                            >
                                {{ link.label }}
                            </router-link>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div v-motion-fade :delay="200">
                    <h3 class="text-lg font-semibold mb-6 text-white">Contact</h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                            </div>
                            <a href="https://wa.me/33665411064" target="_blank" class="text-white/60 hover:text-white transition-colors">
                                (+33) 6 65 41 10 64
                            </a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-[#005BFF]/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-[#005BFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <a href="tel:+221789267787" class="text-white/60 hover:text-white transition-colors">
                                (+221) 78 926 77 87
                            </a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <a href="mailto:dmohamedkounta@gmail.com" class="text-white/60 hover:text-white transition-colors">
                                dmohamedkounta@gmail.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 mt-12 pt-8 text-center text-sm text-white/40">
                <p>&copy; {{ new Date().getFullYear() }} MKD-pro. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</template>

<script setup>
const logoPath = '/logo.png';

const links = [
    { name: 'home', path: '/', label: 'Accueil' },
    { name: 'services', path: '/services', label: 'Services' },
    { name: 'portfolio', path: '/portfolio', label: 'Réalisations' },
    { name: 'about', path: '/about', label: 'À propos' },
    { name: 'contact', path: '/contact', label: 'Contact' },
];
</script>

<style scoped>
.logo-container {
    position: relative;
}

.logo-container::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(0, 91, 255, 0.4) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.logo-container:hover::after {
    opacity: 1;
}
</style>
