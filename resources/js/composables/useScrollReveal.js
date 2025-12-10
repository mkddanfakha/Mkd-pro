import { onMounted, onUnmounted } from 'vue';

export function useScrollReveal(options = {}) {
    const {
        threshold = 0.1,
        rootMargin = '0px 0px -50px 0px',
        staggerDelay = 100,
    } = options;

    let observer = null;
    const elements = [];

    const initObserver = () => {
        observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('revealed');
                        }, index * staggerDelay);
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold,
                rootMargin,
            }
        );
    };

    const observeElement = (element) => {
        if (!element) return;
        
        if (!observer) {
            initObserver();
        }

        element.classList.add('reveal-on-scroll');
        observer.observe(element);
        elements.push(element);
    };

    const observeElements = (selector) => {
        const els = document.querySelectorAll(selector);
        els.forEach((el) => observeElement(el));
    };

    const cleanup = () => {
        if (observer) {
            elements.forEach((el) => {
                observer.unobserve(el);
            });
            observer.disconnect();
            observer = null;
        }
    };

    onMounted(() => {
        initObserver();
    });

    onUnmounted(() => {
        cleanup();
    });

    return {
        observeElement,
        observeElements,
        cleanup,
    };
}

