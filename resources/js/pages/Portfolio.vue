<template>
    <div class="min-h-screen py-20">
        <!-- Hero Section -->
        <section class="relative py-32">
            <div class="absolute inset-0 bg-gradient-to-br from-[#0A0A0A] via-[#1A1A1A] to-[#0A0A0A]"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white" v-motion-fade>
                    Mes Projets Réalisés
                </h1>
                <p class="text-xl text-white/70 max-w-2xl mx-auto" v-motion-fade :delay="100">
                    Découvrez les solutions digitales que j'ai créées pour les PME sénégalaises
                </p>
            </div>
        </section>

        <!-- Projects Grid -->
        <section class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div v-if="loading" class="text-center py-32">
                    <div class="inline-block animate-spin rounded-full h-16 w-16 border-4 border-[#005BFF] border-t-transparent"></div>
                </div>

                <div v-else-if="projects.length === 0" class="text-center py-20">
                    <p class="text-white/60 text-lg">Aucun projet disponible pour le moment.</p>
                </div>

                <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        v-for="(project, index) in projects"
                        :key="project.id"
                        class="card-premium overflow-hidden group cursor-pointer"
                        @click="openModal(project)"
                        v-motion-fade
                        :delay="index * 100"
                    >
                        <div class="p-8">
                            <div class="w-16 h-16 bg-[#005BFF]/20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-[#005BFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-white">{{ project.title }}</h3>
                            <p class="text-white/60 mb-6 line-clamp-3 leading-relaxed">{{ project.description }}</p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span
                                    v-for="feature in project.features?.slice(0, 3)"
                                    :key="feature"
                                    class="px-3 py-1 bg-[#005BFF]/20 text-[#005BFF] text-sm rounded-full border border-[#005BFF]/30"
                                >
                                    {{ feature }}
                                </span>
                            </div>
                            <div class="text-[#005BFF] font-semibold flex items-center gap-2 group-hover:gap-3 transition-all">
                                Voir les détails
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="mt-20 text-center card-premium p-10" v-motion-fade>
                    <h2 class="text-3xl font-bold mb-4 text-white">Vous avez un projet similaire ?</h2>
                    <p class="text-white/60 mb-8 text-lg">Contactez-moi pour discuter de votre projet de digitalisation.</p>
                    <router-link
                        to="/contact"
                        class="btn-premium inline-flex items-center justify-center"
                    >
                        Discuter de mon projet
                    </router-link>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div
            v-if="selectedProject"
            class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4"
            @click.self="closeModal"
            v-motion-fade
        >
            <div class="card-premium max-w-4xl w-full max-h-[90vh] overflow-y-auto" v-motion-scale>
                <div class="p-10">
                    <div class="flex justify-between items-start mb-8">
                        <h2 class="text-4xl font-bold text-white">{{ selectedProject.title }}</h2>
                        <button
                            @click="closeModal"
                            class="text-white/60 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-lg"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-lg text-white/70 mb-10 leading-relaxed">{{ selectedProject.description }}</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                        <div
                            v-for="feature in selectedProject.features"
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
                            to="/contact"
                            class="btn-premium inline-flex items-center justify-center"
                        >
                            Discuter de ce projet
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { projectService } from '../api/services';

const projects = ref([]);
const loading = ref(true);
const selectedProject = ref(null);

onMounted(async () => {
    try {
        const response = await projectService.getAll();
        // L'API retourne maintenant directement un tableau
        projects.value = Array.isArray(response.data) ? response.data : [];
        console.log('Projects loaded:', projects.value);
    } catch (error) {
        console.error('Error loading projects:', error);
    } finally {
        loading.value = false;
    }
});

const openModal = (project) => {
    selectedProject.value = project;
    document.body.style.overflow = 'hidden';
};

const closeModal = () => {
    selectedProject.value = null;
    document.body.style.overflow = '';
};
</script>
