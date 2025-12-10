<template>
    <component
        :is="tag"
        :to="to"
        :href="href"
        :type="type"
        :class="['ripple-button', customClass]"
        @click="createRipple"
        v-bind="$attrs"
    >
        <slot></slot>
        <span
            v-for="(ripple, index) in ripples"
            :key="index"
            class="ripple"
            :style="{
                left: ripple.x + 'px',
                top: ripple.y + 'px',
            }"
        ></span>
    </component>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    to: String,
    href: String,
    type: {
        type: String,
        default: 'button',
    },
    customClass: {
        type: String,
        default: '',
    },
});

const ripples = ref([]);
let rippleId = 0;

const createRipple = (event) => {
    const button = event.currentTarget;
    const rect = button.getBoundingClientRect();
    const x = event.clientX - rect.left;
    const y = event.clientY - rect.top;

    const ripple = {
        id: rippleId++,
        x,
        y,
    };

    ripples.value.push(ripple);

    setTimeout(() => {
        ripples.value = ripples.value.filter((r) => r.id !== ripple.id);
    }, 600);
};

const tag = props.to ? 'router-link' : props.href ? 'a' : 'button';
</script>

<style scoped>
.ripple-button {
    position: relative;
    overflow: hidden;
}

.ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.6);
    transform: scale(0);
    animation: ripple-animation 0.6s ease-out;
    pointer-events: none;
    width: 20px;
    height: 20px;
    margin-left: -10px;
    margin-top: -10px;
}

@keyframes ripple-animation {
    to {
        transform: scale(4);
        opacity: 0;
    }
}
</style>

