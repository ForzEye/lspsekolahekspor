import './bootstrap';

import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';

// Register the intersect plugin for scroll-based animations
Alpine.plugin(intersect);

window.Alpine = Alpine;

Alpine.start();
