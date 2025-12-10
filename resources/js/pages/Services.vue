<template>
    <div class="min-h-screen py-20">
        <!-- Hero Section -->
        <section class="relative py-32">
            <div class="absolute inset-0 bg-gradient-to-br from-[#0A0A0A] via-[#1A1A1A] to-[#0A0A0A]"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white" v-motion-fade>
                    Mes Services de Digitalisation
                </h1>
                <p class="text-xl text-white/70 max-w-2xl mx-auto" v-motion-fade :delay="100">
                    Des solutions sur mesure pour transformer votre entreprise
                </p>
            </div>
        </section>

        <!-- Services Grid -->
        <section class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div v-if="loading" class="text-center py-32">
                    <div class="inline-block animate-spin rounded-full h-16 w-16 border-4 border-[#005BFF] border-t-transparent"></div>
                </div>

                <div v-else class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div
                        v-for="(service, index) in services"
                        :key="service.id"
                        class="card-premium p-10"
                        v-motion-fade
                        :delay="index * 100"
                    >
                        <ServiceIcon :icon="service.icon" />
                        <h2 class="text-2xl font-bold mb-4 text-white">{{ service.title }}</h2>
                        <p class="text-white/60 leading-relaxed">{{ service.description }}</p>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="mt-20 text-center" v-motion-fade>
                    <router-link
                        to="/contact"
                        class="btn-premium inline-flex items-center justify-center"
                    >
                        Demander un devis
                    </router-link>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { serviceService } from '../api/services';
import ServiceIcon from '../components/ServiceIcon.vue';

const services = ref([]);
const loading = ref(true);

onMounted(async () => {
    try {
        const response = await serviceService.getAll();
        // L'API retourne maintenant directement un tableau
        services.value = Array.isArray(response.data) ? response.data : [];
    } catch (error) {
        console.error('Error loading services:', error);
    } finally {
        loading.value = false;
    }
});
</script>
