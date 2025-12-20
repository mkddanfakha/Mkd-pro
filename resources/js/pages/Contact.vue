<template>
    <div class="min-h-screen py-20">
        <!-- Hero Section -->
        <section class="relative py-32">
            <div class="absolute inset-0 bg-gradient-to-br from-[#0A0A0A] via-[#1A1A1A] to-[#0A0A0A]"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white" v-motion-fade>
                    Contactez-moi
                </h1>
                <p class="text-xl text-white/70 mt-4">
                    Discutons de votre projet de digitalisation
                </p>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Info -->
                    <div v-motion-fade>
                        <h2 class="text-3xl font-bold mb-10 text-white">Informations de contact</h2>

                        <div class="space-y-6 mb-10">
                            <div class="flex items-start card-premium p-6">
                                <div class="w-14 h-14 bg-green-500/20 rounded-xl flex items-center justify-center mr-5 flex-shrink-0">
                                    <svg class="w-7 h-7 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-2 text-white">WhatsApp</h3>
                                    <a href="https://wa.me/221789267787" target="_blank" class="text-[#005BFF] hover:text-[#00A3FF] transition-colors">
                                        (+221) 78 926 77 87
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start card-premium p-6">
                                <div class="w-14 h-14 bg-[#005BFF]/20 rounded-xl flex items-center justify-center mr-5 flex-shrink-0">
                                    <svg class="w-7 h-7 text-[#005BFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-2 text-white">Téléphone</h3>
                                    <a href="tel:+33665411064" class="text-[#005BFF] hover:text-[#00A3FF] transition-colors">
                                        (+33) 6 65 41 10 64
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start card-premium p-6">
                                <div class="w-14 h-14 bg-purple-500/20 rounded-xl flex items-center justify-center mr-5 flex-shrink-0">
                                    <svg class="w-7 h-7 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-2 text-white">Email</h3>
                                    <a href="mailto:contact@mkd-pro.com" class="text-[#005BFF] hover:text-[#00A3FF] transition-colors">
                                        contact@mkd-pro.com
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-premium p-6">
                            <h3 class="text-lg font-semibold mb-3 text-white">Réponse rapide garantie</h3>
                            <p class="text-white/60 text-sm leading-relaxed">
                                Je réponds généralement dans les 24 heures. Pour une réponse immédiate, privilégiez WhatsApp.
                            </p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div v-motion-fade :delay="100">
                        <h2 class="text-3xl font-bold mb-10 text-white">Envoyez-moi un message</h2>

                        <Form 
                            @submit="submitForm" 
                            :validation-schema="schema" 
                            v-slot="{ errors: formErrors, validateField, resetForm }"
                            :key="formKey"
                        >
                            <div class="space-y-6">
                                <!-- Nom -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-white/80 mb-2">
                                        Nom <span class="text-red-400">*</span>
                                    </label>
                                    <Field
                                        type="text"
                                        id="name"
                                        name="name"
                                        v-model="form.name"
                                        @input="() => validateField('name')"
                                        class="w-full px-5 py-4 bg-white/5 border rounded-xl focus:ring-2 focus:ring-[#005BFF] focus:border-[#005BFF] transition-all text-white placeholder-white/40"
                                        :class="formErrors.name ? 'border-red-500' : 'border-white/10'"
                                        placeholder="Votre nom"
                                    />
                                    <ErrorMessage name="name" class="mt-2 text-sm text-red-400" />
                                </div>

                                <!-- Entreprise (optionnel) -->
                                <div>
                                    <label for="company" class="block text-sm font-medium text-white/80 mb-2">
                                        Entreprise
                                    </label>
                                    <Field
                                        type="text"
                                        id="company"
                                        name="company"
                                        v-model="form.company"
                                        class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-[#005BFF] focus:border-[#005BFF] transition-all text-white placeholder-white/40"
                                        placeholder="Nom de votre entreprise"
                                    />
                                </div>

                                <!-- Téléphone -->
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-white/80 mb-2">
                                        Téléphone <span class="text-red-400">*</span>
                                    </label>
                                    <Field
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        v-model="form.phone"
                                        @input="() => validateField('phone')"
                                        class="w-full px-5 py-4 bg-white/5 border rounded-xl focus:ring-2 focus:ring-[#005BFF] focus:border-[#005BFF] transition-all text-white placeholder-white/40"
                                        :class="formErrors.phone ? 'border-red-500' : 'border-white/10'"
                                        placeholder="+221 XX XXX XX XX"
                                    />
                                    <ErrorMessage name="phone" class="mt-2 text-sm text-red-400" />
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-white/80 mb-2">
                                        Email <span class="text-red-400">*</span>
                                    </label>
                                    <Field
                                        type="email"
                                        id="email"
                                        name="email"
                                        v-model="form.email"
                                        @input="() => validateField('email')"
                                        class="w-full px-5 py-4 bg-white/5 border rounded-xl focus:ring-2 focus:ring-[#005BFF] focus:border-[#005BFF] transition-all text-white placeholder-white/40"
                                        :class="formErrors.email ? 'border-red-500' : 'border-white/10'"
                                        placeholder="votre@email.com"
                                    />
                                    <ErrorMessage name="email" class="mt-2 text-sm text-red-400" />
                                </div>

                                <!-- Message -->
                                <div>
                                    <label for="message" class="block text-sm font-medium text-white/80 mb-2">
                                        Message <span class="text-red-400">*</span>
                                    </label>
                                    <Field
                                        as="textarea"
                                        id="message"
                                        name="message"
                                        v-model="form.message"
                                        rows="6"
                                        @input="() => validateField('message')"
                                        class="w-full px-5 py-4 bg-white/5 border rounded-xl focus:ring-2 focus:ring-[#005BFF] focus:border-[#005BFF] transition-all text-white placeholder-white/40 resize-none"
                                        :class="formErrors.message ? 'border-red-500' : 'border-white/10'"
                                        placeholder="Décrivez votre projet..."
                                    />
                                    <ErrorMessage name="message" class="mt-2 text-sm text-red-400" />
                                </div>

                                <!-- Simple Captcha -->
                                <div>
                                    <SimpleCaptcha ref="captchaRef" />
                                </div>

                                <!-- Messages de succès/erreur -->
                                <div v-if="successMessage" class="p-4 bg-green-500/20 border border-green-500/30 text-green-400 rounded-xl">
                                    {{ successMessage }}
                                </div>

                                <div v-if="errorMessage" class="p-4 bg-red-500/20 border border-red-500/30 text-red-400 rounded-xl">
                                    {{ errorMessage }}
                                </div>

                                <!-- Bouton submit -->
                                <button
                                    type="submit"
                                    :disabled="loading"
                                    class="btn-premium w-full"
                                >
                                    <span v-if="loading">Envoi en cours...</span>
                                    <span v-else>Envoyer le message</span>
                                </button>
                            </div>
                        </Form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import { contactService } from '../api/services';
import SimpleCaptcha from '../components/SimpleCaptcha.vue';

const form = ref({
    name: '',
    company: '',
    phone: '',
    email: '',
    message: '',
});

const loading = ref(false);
const successMessage = ref('');
const errorMessage = ref('');
const captchaRef = ref(null);
const formKey = ref(0);

// Schéma de validation avec VeeValidate et Yup
const schema = yup.object({
    name: yup
        .string()
        .required('Le nom est obligatoire')
        .min(2, 'Le nom doit contenir au moins 2 caractères')
        .max(255, 'Le nom est trop long'),
    company: yup
        .string()
        .max(255, 'Le nom de l\'entreprise est trop long'),
    phone: yup
        .string()
        .required('Le téléphone est obligatoire')
        .min(8, 'Le numéro de téléphone est trop court')
        .max(20, 'Le numéro de téléphone est trop long')
        .matches(/^[\d\s\+\-\(\)]+$/, 'Format de téléphone invalide'),
    email: yup
        .string()
        .required('L\'email est obligatoire')
        .email('Format d\'email invalide')
        .max(255, 'L\'email est trop long'),
    message: yup
        .string()
        .required('Le message est obligatoire')
        .min(10, 'Le message doit contenir au moins 10 caractères')
        .max(1000, 'Le message est trop long (maximum 1000 caractères)'),
});

const submitForm = async (values) => {
    // Valider le captcha d'abord côté frontend
    if (captchaRef.value) {
        const captchaValid = await captchaRef.value.validateCaptcha();
        if (!captchaValid) {
            alert('Captcha incorrect');
            return;
        }
    }

    loading.value = true;
    successMessage.value = '';
    errorMessage.value = '';

    try {
        // Ajouter la réponse du captcha aux données du formulaire
        const captchaAnswer = captchaRef.value?.getAnswer();
        const formData = {
            ...values,
            captcha_answer: captchaAnswer ? parseInt(captchaAnswer) : null,
        };

        await contactService.sendMessage(formData);
        successMessage.value = 'Votre message a été envoyé avec succès !';
        
        // Réinitialiser le formulaire VeeValidate
        resetForm();
        
        // Réinitialiser les valeurs locales
        form.value = {
            name: '',
            company: '',
            phone: '',
            email: '',
            message: '',
        };
        
        // Forcer la réinitialisation complète du formulaire en changeant la clé
        formKey.value += 1;
        
        // Recharger un nouveau captcha après succès
        if (captchaRef.value) {
            captchaRef.value.refreshCaptcha();
        }
    } catch (error) {
        if (error.errors) {
            // Erreurs de validation du serveur
            errorMessage.value = Object.values(error.errors).flat().join(', ');
        } else {
            errorMessage.value = error.message || 'Une erreur est survenue. Veuillez réessayer.';
        }
    } finally {
        loading.value = false;
    }
};
</script>
