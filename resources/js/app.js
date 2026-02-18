/**
 * app.js — ContractVault entry point
 * ────────────────────────────────────
 * Boots Alpine.js (Blade interactivity) and Vue (for richer components).
 */

import './bootstrap';

// Alpine.js — powers x-data, x-show, x-transition in Blade templates
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Vue — add components here as needed
// Example:
// import { createApp } from 'vue';
// import ContractTimeline from './components/ContractTimeline.vue';
// const el = document.querySelector('#vue-timeline');
// if (el) createApp(ContractTimeline).mount(el);
