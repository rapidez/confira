import { defineAsyncComponent } from 'vue'

document.addEventListener('vue:loaded', (event) => {
    const vue = event.detail.vue
    vue.component('slide-in', defineAsyncComponent(() => import('./components/SlideIn.vue')))
})