<template>
    <div class="simple-captcha">
        <div v-if="loading" class="text-white/60 text-sm">
            Chargement du captcha...
        </div>
        
        <div v-else-if="question" class="space-y-4">
            <label class="block text-sm font-medium text-white/80 mb-2">
                Vérification <span class="text-red-400">*</span>
            </label>
            <div class="flex items-center gap-3">
                <div class="flex-1">
                    <p class="text-white/60 text-sm mb-2">{{ question }}</p>
                    <input
                        type="number"
                        v-model="answer"
                        @keypress.enter="handleEnter"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-[#005BFF] focus:border-[#005BFF] transition-all text-white placeholder-white/40"
                        :class="error ? 'border-red-500' : ''"
                        placeholder="Votre réponse"
                        :disabled="validating"
                    />
                    <p v-if="error" class="mt-2 text-sm text-red-400">{{ error }}</p>
                </div>
                <button
                    type="button"
                    @click="refreshCaptcha"
                    class="p-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl transition-all text-white/80 hover:text-white"
                    :disabled="loading"
                    title="Nouveau captcha"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </button>
            </div>
        </div>
        
        <div v-else-if="error" class="text-red-400 text-sm">
            Erreur lors du chargement du captcha. Veuillez réessayer.
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import api from '../api/axios';

const question = ref('');
const answer = ref('');
const loading = ref(false);
const validating = ref(false);
const error = ref('');

/**
 * Charge un nouveau captcha depuis l'API
 */
const loadCaptcha = async () => {
    loading.value = true;
    error.value = '';
    answer.value = '';
    
    try {
        const response = await api.get('/simple-captcha');
        question.value = response.data.question;
    } catch (err) {
        error.value = 'Impossible de charger le captcha. Veuillez réessayer.';
        console.error('Error loading captcha:', err);
    } finally {
        loading.value = false;
    }
};

/**
 * Rafraîchit le captcha
 */
const refreshCaptcha = () => {
    loadCaptcha();
};

/**
 * Gère la touche Entrée
 */
const handleEnter = () => {
    // Ne rien faire, la validation sera faite par le formulaire parent
};

/**
 * Valide le captcha et retourne le résultat
 * @returns {Promise<boolean>} true si valide, false sinon
 */
const validateCaptcha = async () => {
    if (!answer.value || answer.value === '') {
        error.value = 'Veuillez répondre à la question.';
        return false;
    }

    validating.value = true;
    error.value = '';

    try {
        const response = await api.post('/simple-captcha/verify', {
            answer: parseInt(answer.value),
        });

        if (response.data.success) {
            return true;
        } else {
            error.value = response.data.message || 'Réponse incorrecte.';
            // Recharger un nouveau captcha après une erreur
            await loadCaptcha();
            return false;
        }
    } catch (err) {
        if (err.response?.status === 422) {
            error.value = err.response.data.message || 'Réponse incorrecte.';
            // Recharger un nouveau captcha après une erreur
            await loadCaptcha();
        } else {
            error.value = 'Erreur lors de la vérification. Veuillez réessayer.';
        }
        return false;
    } finally {
        validating.value = false;
    }
};

// Charger le captcha au montage
onMounted(() => {
    loadCaptcha();
});

// Exposer la méthode validateCaptcha et la valeur answer pour qu'elles soient accessibles depuis le parent
defineExpose({
    validateCaptcha,
    refreshCaptcha,
    getAnswer: () => answer.value,
});
</script>

<style scoped>
.simple-captcha {
    /* Styles minimaux, le reste utilise TailwindCSS */
}
</style>

