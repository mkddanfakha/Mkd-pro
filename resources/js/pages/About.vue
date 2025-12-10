<template>
    <div class="min-h-screen py-20">
        <!-- Hero Section -->
        <section class="relative py-32">
            <div class="absolute inset-0 bg-gradient-to-br from-[#0A0A0A] via-[#1A1A1A] to-[#0A0A0A]"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white" v-motion-fade>
                    À propos de moi
                </h1>
            </div>
        </section>

        <!-- About Content -->
        <section class="py-24 relative">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div v-if="loading" class="text-center py-32">
                    <div class="inline-block animate-spin rounded-full h-16 w-16 border-4 border-[#005BFF] border-t-transparent"></div>
                </div>

                <div v-else class="card-premium p-10 md:p-14" v-motion-fade>
                    <p class="text-xl text-white/80 mb-8 leading-relaxed">
                        {{ aboutData?.content }}
                    </p>

                    <div class="bg-[#005BFF]/10 border-l-4 border-[#005BFF] p-8 mb-10 rounded-r-xl" v-motion-slide-left>
                        <p class="text-lg text-white font-medium leading-relaxed">
                            {{ aboutData?.mission }}
                        </p>
                    </div>

                    <h2 class="text-3xl font-bold text-white mb-10">Mes Valeurs</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div
                            v-for="(value, index) in aboutData?.values"
                            :key="value.name"
                            class="bg-white/5 p-8 rounded-xl border border-white/10 hover:border-[#005BFF]/30 transition-all duration-300"
                            v-motion-fade
                            :delay="index * 100"
                        >
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-[#005BFF]/20 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#005BFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white">{{ value.name }}</h3>
                            </div>
                            <p class="text-white/60 leading-relaxed">{{ value.description }}</p>
                        </div>
                    </div>

                    <div class="mt-12 text-center" v-motion-fade>
                        <router-link
                            to="/contact"
                            class="btn-premium inline-flex items-center justify-center"
                        >
                            Discutons de votre projet
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { aboutService } from '../api/services';

const aboutData = ref(null);
const loading = ref(true);

onMounted(async () => {
    try {
        const response = await aboutService.getAbout();
        aboutData.value = response.data;
    } catch (error) {
        console.error('Error loading about data:', error);
    } finally {
        loading.value = false;
    }
});
</script>
