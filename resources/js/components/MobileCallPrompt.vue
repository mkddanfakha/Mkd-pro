<template>
    <div
        v-if="showPrompt"
        class="mobile-call-prompt"
        v-motion-slide-up
    >
        <div class="prompt-content">
            <div class="prompt-icon">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
            </div>
            <div class="prompt-text">
                <p class="prompt-title">Appuyez pour appeler</p>
                <a :href="`tel:${phoneNumber}`" class="prompt-phone">{{ formattedPhone }}</a>
            </div>
            <button @click="dismissPrompt" class="prompt-close" aria-label="Fermer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';

const phoneNumber = '+221789267787';
const dismissed = ref(false);
const isMobile = ref(false);

const formattedPhone = computed(() => {
    return '(+221) 78 926 77 87';
});

const showPrompt = computed(() => {
    return isMobile.value && !dismissed.value;
});

const checkMobile = () => {
    const userAgent = navigator.userAgent || navigator.vendor || window.opera;
    const isMobileDevice = /android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(userAgent.toLowerCase());
    isMobile.value = isMobileDevice && window.innerWidth < 768;
};

const dismissPrompt = () => {
    dismissed.value = true;
    localStorage.setItem('mkd-pro-call-prompt-dismissed', 'true');
};

onMounted(() => {
    checkMobile();
    window.addEventListener('resize', checkMobile);
    
    // Check if user already dismissed
    if (localStorage.getItem('mkd-pro-call-prompt-dismissed') === 'true') {
        dismissed.value = true;
    }
    
    // Auto-dismiss after 10 seconds
    setTimeout(() => {
        dismissPrompt();
    }, 10000);
});
</script>

<style scoped>
.mobile-call-prompt {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 999;
    padding: 1rem;
    background: linear-gradient(135deg, rgba(0, 91, 255, 0.95) 0%, rgba(0, 64, 204, 0.95) 100%);
    backdrop-filter: blur(20px);
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.3);
}

.prompt-content {
    display: flex;
    align-items: center;
    gap: 1rem;
    max-width: 600px;
    margin: 0 auto;
}

.prompt-icon {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.prompt-text {
    flex: 1;
    color: white;
}

.prompt-title {
    font-size: 0.75rem;
    font-weight: 500;
    opacity: 0.9;
    margin-bottom: 0.25rem;
}

.prompt-phone {
    font-size: 1rem;
    font-weight: 600;
    color: white;
    text-decoration: none;
    display: block;
    transition: opacity 0.2s;
}

.prompt-phone:active {
    opacity: 0.7;
}

.prompt-close {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    cursor: pointer;
    transition: background 0.2s;
    flex-shrink: 0;
}

.prompt-close:active {
    background: rgba(255, 255, 255, 0.3);
}

@media (min-width: 768px) {
    .mobile-call-prompt {
        display: none;
    }
}
</style>

