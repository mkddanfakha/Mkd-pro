<template>
    <nav
        :class="[
            'fixed top-0 left-0 right-0 z-50 transition-all duration-500',
            isScrolled ? 'bg-[#0A0A0A]/90 backdrop-blur-xl shadow-2xl border-b border-white/10' : 'bg-transparent'
        ]"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-24">
                <!-- Logo -->
                <router-link
                    to="/"
                    class="flex items-center space-x-3 group"
                    v-motion-slide-left
                >
                    <div class="logo-container relative">
                        <img
                            :src="logoPath"
                            alt="MKD-pro Logo"
                            class="w-16 h-16 logo-reveal logo-glow object-contain"
                            v-motion-fade
                        />
                    </div>
                    <span class="text-xl font-bold text-white group-hover:text-[#005BFF] transition-colors duration-300">
                        MKD-pro
                    </span>
                </router-link>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-10">
                    <router-link
                        v-for="link in links"
                        :key="link.name"
                        :to="link.path"
                        class="relative text-white/80 hover:text-white font-medium transition-all duration-300 text-sm uppercase tracking-wider"
                        :class="{ 'text-[#005BFF]': $route.name === link.name }"
                        v-motion-fade
                    >
                        {{ link.label }}
                        <span
                            v-if="$route.name === link.name"
                            class="absolute -bottom-2 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-[#005BFF] to-transparent"
                            v-motion-slide-left
                        ></span>
                        <span
                            v-else
                            class="absolute -bottom-2 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-[#005BFF] to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
                        ></span>
                    </router-link>
                </div>

                <!-- Mobile Menu Button -->
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="md:hidden text-white hover:text-[#005BFF] transition-colors p-2"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            v-if="!mobileMenuOpen"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            v-else
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div
                v-if="mobileMenuOpen"
                class="md:hidden pb-6 border-t border-white/10 mt-4 pt-4"
                v-motion-slide-down
            >
                <div class="flex flex-col space-y-3">
                    <router-link
                        v-for="link in links"
                        :key="link.name"
                        :to="link.path"
                        @click="mobileMenuOpen = false"
                        class="px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300 uppercase tracking-wider text-sm"
                        :class="{ 'text-[#005BFF] bg-white/5': $route.name === link.name }"
                    >
                        {{ link.label }}
                    </router-link>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const logoPath = '/logo.png';
const isScrolled = ref(false);
const mobileMenuOpen = ref(false);

const links = [
    { name: 'home', path: '/', label: 'Accueil' },
    { name: 'services', path: '/services', label: 'Services' },
    { name: 'portfolio', path: '/portfolio', label: 'Réalisations' },
    { name: 'about', path: '/about', label: 'À propos' },
    { name: 'contact', path: '/contact', label: 'Contact' },
];

const handleScroll = () => {
    isScrolled.value = window.scrollY > 20;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
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
