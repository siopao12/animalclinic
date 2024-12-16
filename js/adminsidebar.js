    // Sidebar Toggle
    const sidebar = document.getElementById('sidebar');
    const toggleSidebarButton = document.getElementById('toggleSidebar');
    
    toggleSidebarButton.addEventListener('click', () => {
        if (window.innerWidth < 768) {
            // Mobile: Toggle 'show' class for sliding in/out
            sidebar.classList.toggle('show');
            // Update aria-expanded for accessibility
            toggleSidebarButton.setAttribute(
                'aria-expanded',
                sidebar.classList.contains('show')
            );
        } else {
            // Desktop: Toggle 'collapsed' class for collapsing/expanding
            sidebar.classList.toggle('collapsed');
            // Ensure 'show' class is removed to prevent conflict
            sidebar.classList.remove('show');
        }
    });