<template>
    <div class="min-h-screen relative">
        <!-- Animated Background -->
        <div class="animated-bg"></div>
        
        <Navbar />
        <main class="pt-24 relative z-10">
            <transition
                name="page"
                mode="out-in"
                @enter="onPageEnter"
                @leave="onPageLeave"
            >
                <router-view v-slot="{ Component }">
                    <component :is="Component" :key="$route.path" />
                </router-view>
            </transition>
        </main>
        <Footer />
        
        <!-- WhatsApp Floating Button -->
        <WhatsAppButton />
        
        <!-- Mobile Call Prompt -->
        <MobileCallPrompt />
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import { useRouter } from 'vue-router';
import Navbar from '../components/Navbar.vue';
import Footer from '../components/Footer.vue';
import WhatsAppButton from '../components/WhatsAppButton.vue';
import MobileCallPrompt from '../components/MobileCallPrompt.vue';

const router = useRouter();

const onPageEnter = (el) => {
    // Scroll to top on page enter
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

const onPageLeave = () => {
    // Optional: add leave animation logic
};
</script>

<style scoped>
/* Page transitions premium */
/* Enhanced page transitions with fade + slide */
.page-enter-active {
    transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1), 
                transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.page-leave-active {
    transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1), 
                transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.page-enter-from {
    opacity: 0;
    transform: translateY(20px) scale(0.98);
}

.page-leave-to {
    opacity: 0;
    transform: translateY(-10px) scale(0.99);
}

.page-enter-to,
.page-leave-from {
    opacity: 1;
    transform: translateY(0) scale(1);
}
</style>
