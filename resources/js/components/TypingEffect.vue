<template>
    <span class="typing-text">
        <span v-for="(char, index) in displayedText" :key="index" class="typing-char">{{ char === ' ' ? '\u00A0' : char }}</span>
        <span class="typing-cursor" :class="{ 'typing-blink': !isTyping }">|</span>
    </span>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';

const props = defineProps({
    text: {
        type: String,
        required: true,
    },
    speed: {
        type: Number,
        default: 50,
    },
    delay: {
        type: Number,
        default: 0,
    },
    loop: {
        type: Boolean,
        default: false,
    },
});

const displayedText = ref('');
const isTyping = ref(true);
let timeoutId = null;

const typeText = () => {
    displayedText.value = '';
    isTyping.value = true;
    let currentIndex = 0;

    const type = () => {
        if (currentIndex < props.text.length) {
            displayedText.value += props.text[currentIndex];
            currentIndex++;
            timeoutId = setTimeout(type, props.speed);
        } else {
            isTyping.value = false;
            if (props.loop) {
                timeoutId = setTimeout(() => {
                    typeText();
                }, 2000);
            }
        }
    };

    if (props.delay > 0) {
        timeoutId = setTimeout(type, props.delay);
    } else {
        type();
    }
};

onMounted(() => {
    typeText();
});

onUnmounted(() => {
    if (timeoutId) {
        clearTimeout(timeoutId);
    }
});

watch(() => props.text, () => {
    if (timeoutId) {
        clearTimeout(timeoutId);
    }
    typeText();
});
</script>

<style scoped>
.typing-text {
    display: inline-block;
}

.typing-char {
    display: inline-block;
    animation: fadeInChar 0.1s ease-in;
}

@keyframes fadeInChar {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.typing-cursor {
    display: inline-block;
    margin-left: 2px;
    color: #005BFF;
    font-weight: 300;
    animation: typingBlink 1s infinite;
}

.typing-blink {
    animation: typingBlink 1s infinite;
}

@keyframes typingBlink {
    0%, 50% {
        opacity: 1;
    }
    51%, 100% {
        opacity: 0;
    }
}
</style>

