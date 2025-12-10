<template>
    <div>
        <!-- Loading State -->
        <div v-if="loading" class="min-h-screen flex items-center justify-center">
            <div class="text-center">
                <div class="inline-block animate-spin rounded-full h-16 w-16 border-4 border-[#005BFF] border-t-transparent mb-4"></div>
                <p class="text-white/60">Chargement des données...</p>
            </div>
        </div>

        <!-- Hero Section with Parallax -->
        <section v-if="!loading" class="hero-parallax relative min-h-screen flex items-center justify-center overflow-hidden">
            <div class="parallax-bg" :style="{ transform: `translateY(${parallaxOffset}px)` }"></div>
            
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-32">
                <div v-motion-fade>
                    <!-- Logo -->
                    <div class="mb-12 flex justify-center" v-motion-slide-top>
                        <div class="logo-container relative">
                            <img
                                :src="logoPath"
                                alt="MKD-pro Logo"
                                class="w-48 h-48 logo-reveal logo-glow object-contain mx-auto"
                            />
                        </div>
                    </div>

                    <h1
                        class="text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-8 leading-tight"
                        v-motion-slide-bottom
                    >
                        Digitalisation sur mesure<br />
                        <span class="bg-gradient-to-r from-[#005BFF] to-[#00A3FF] bg-clip-text text-transparent">
                            pour les PME du Sénégal
                        </span>
                    </h1>
                    <p
                        class="text-xl md:text-2xl text-white/70 mb-12 max-w-3xl mx-auto leading-relaxed"
                        v-motion-slide-bottom
                        :delay="100"
                    >
                        <TypingEffect 
                            text="Optimisez votre activité, gagnez du temps et modernisez votre gestion."
                            :speed="50"
                            :delay="800"
                        />
                    </p>

                    <!-- CTA Buttons -->
                    <div
                        class="flex flex-col sm:flex-row gap-6 justify-center"
                        v-motion-slide-bottom
                        :delay="200"
                    >
                        <RippleButton
                            to="/contact"
                            custom-class="btn-premium inline-flex items-center justify-center"
                        >
                            Demander une démo
                        </RippleButton>
                        <RippleButton
                            href="https://wa.me/33665411064"
                            custom-class="btn-secondary inline-flex items-center justify-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            Contact WhatsApp
                        </RippleButton>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section v-if="homeData && homeData.services" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2
                    class="text-4xl md:text-5xl font-bold text-center mb-16 text-white"
                    v-motion-fade
                >
                    {{ homeData.services.title }}
                </h2>
                
                <div v-if="homeData.services.items && Array.isArray(homeData.services.items) && homeData.services.items.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        v-for="(service, index) in homeData.services.items"
                        :key="service.id"
                        class="card-premium card-premium-3d p-8"
                        v-motion-fade
                        :delay="index * 100"
                    >
                        <ServiceIcon :icon="service.icon" />
                        <h3 class="text-xl font-semibold mb-3 text-white">{{ service.title }}</h3>
                        <p class="text-white/60 leading-relaxed">{{ service.description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Section -->
        <section v-if="homeData && homeData.why" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2
                    class="text-4xl md:text-5xl font-bold text-center mb-16 text-white"
                    v-motion-fade
                >
                    {{ homeData.why.title }}
                </h2>
                <div v-if="homeData.why.items && Array.isArray(homeData.why.items) && homeData.why.items.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        v-for="(item, index) in homeData.why.items"
                        :key="item.id"
                        class="card-premium p-8"
                        v-motion-fade
                        :delay="index * 100"
                    >
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white">{{ item.title }}</h3>
                        </div>
                        <p class="text-white/60 leading-relaxed">{{ item.description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Project Example -->
        <section v-if="homeData?.project_example?.project" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2
                    class="text-4xl md:text-5xl font-bold text-center mb-16 text-white"
                    v-motion-fade
                >
                    {{ homeData.project_example.title }}
                </h2>
                <div class="max-w-5xl mx-auto">
                    <div
                        class="card-premium p-10 md:p-14"
                        v-motion-fade
                    >
                        <h3 class="text-3xl md:text-4xl font-bold mb-6 text-white">
                            {{ homeData.project_example.project.title }}
                        </h3>
                        <p class="text-lg text-white/70 mb-10 leading-relaxed">
                            {{ homeData.project_example.project.description }}
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                            <div
                                v-for="feature in homeData.project_example.project.features"
                                :key="feature"
                                class="bg-white/5 p-5 rounded-xl border border-white/10"
                            >
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-[#005BFF] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-medium text-white">{{ feature }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <router-link
                                to="/portfolio"
                                class="btn-premium inline-flex items-center justify-center"
                            >
                                Voir projet
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { homeService } from '../api/services';
import TypingEffect from '../components/TypingEffect.vue';
import RippleButton from '../components/RippleButton.vue';
import ServiceIcon from '../components/ServiceIcon.vue';
import { useScrollReveal } from '../composables/useScrollReveal';

const logoPath = '/logo.png';
const homeData = ref(null);
const loading = ref(true);
const parallaxOffset = ref(0);
const { observeElements } = useScrollReveal({ staggerDelay: 100 });

const handleScroll = () => {
    const scrolled = window.pageYOffset;
    parallaxOffset.value = scrolled * 0.5;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    // Observe elements for scroll reveal
    setTimeout(() => {
        observeElements('.card-premium');
    }, 500);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

onMounted(async () => {
    try {
        const response = await homeService.getHomeData();
        homeData.value = response.data;
    } catch (error) {
        console.error('Error loading home data:', error);
    } finally {
        loading.value = false;
    }
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
    width: 150%;
    height: 150%;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(0, 91, 255, 0.3) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.5s ease;
    pointer-events: none;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(1);
    }
    50% {
        opacity: 0.5;
        transform: translate(-50%, -50%) scale(1.1);
    }
}

/* Hero Parallax Styles */
.hero-parallax {
    position: relative;
}

.parallax-bg {
    position: absolute;
    top: -50%;
    left: 0;
    width: 100%;
    height: 200%;
    background: 
        radial-gradient(circle at 20% 50%, rgba(0, 91, 255, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(0, 91, 255, 0.12) 0%, transparent 50%),
        radial-gradient(circle at 40% 20%, rgba(0, 91, 255, 0.08) 0%, transparent 50%),
        linear-gradient(135deg, #0A0A0A 0%, #1A1A1A 50%, #0A0A0A 100%);
    background-size: 200% 200%;
    will-change: transform;
    transition: transform 0.1s ease-out;
}
</style>
