
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

// Handle viewport resizing
window.addEventListener('resize', () => {
    if (window.innerWidth >= 768 && sidebar.classList.contains('show')) {
        // Remove 'show' class for mobile when switching to desktop
        sidebar.classList.remove('show');
    } else if (window.innerWidth < 768 && sidebar.classList.contains('collapsed')) {
        // Remove 'collapsed' class for desktop when switching to mobile
        sidebar.classList.remove('collapsed');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,today' // Default for large screens
        },
        buttonText: {
            dayGridMonth: 'Month',
            timeGridWeek: 'Week',
            timeGridDay: 'Day',
        },
        themeSystem: 'bootstrap',
        events: [
            { title: 'Vaccination - Fluffy', start: '2024-12-25T10:00:00' }, // 10 AM
            { title: 'Check-up - Snowball', start: '2024-12-10T15:00:00' }  // 3 PM
        ],
        eventTimeFormat: { // Customize the time display
            hour: '2-digit',
            minute: '2-digit',
            meridiem: true
        }
    });

    // Adjust buttons for smaller screens
    if (window.innerWidth <= 768) { // Bootstrap's md breakpoint
        calendar.setOption('headerToolbar', {
            left: 'prev,next',
            center: 'title',
            right: '' // Hide buttons on mobile
        });
    }

    calendar.render();
});


      document.addEventListener('DOMContentLoaded', function () {
    const petsContainer = document.getElementById('petsContainer');
    const prevBtn = document.getElementById('prevPet');
    const nextBtn = document.getElementById('nextPet');

    // Track the scroll position
    let scrollAmount = 0;

    // Width of one card including margin
    const cardWidth = petsContainer.querySelector('.pet-card').offsetWidth + 20; // Adjust for card margin

    // Previous Button Event
    prevBtn.addEventListener('click', () => {
        scrollAmount -= cardWidth;
        if (scrollAmount < 0) scrollAmount = 0; // Prevent scrolling beyond the start
        petsContainer.style.transform = `translateX(-${scrollAmount}px)`;
    });

    // Next Button Event
    nextBtn.addEventListener('click', () => {
        const maxScroll = petsContainer.scrollWidth - petsContainer.offsetWidth; // Max scroll limit
        scrollAmount += cardWidth;
        if (scrollAmount > maxScroll) scrollAmount = maxScroll; // Prevent scrolling beyond the end
        petsContainer.style.transform = `translateX(-${scrollAmount}px)`;
    });
});

