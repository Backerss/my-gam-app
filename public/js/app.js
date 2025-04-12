import './bootstrap';

// Import our theme CSS 
import '../css/theme.css';

// Initialize theme
document.addEventListener('DOMContentLoaded', function() {
    // Check for dark mode preference
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    if (isDarkMode) {
        document.documentElement.classList.add('dark');
    }
    
    // Initialize Bootstrap modals
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        new bootstrap.Modal(modal);
    });
    
    // Initialize tooltips (if any)
    const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltips.forEach(tooltip => {
        new bootstrap.Tooltip(tooltip);
    });
});
