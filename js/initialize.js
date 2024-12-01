
window.onload = function () {
    const links = {
        dashboardLink: "dashboardSection",
        myPetsLink: "myPetsSection",
        clinicLink: "ClinicServices",
    };

    Object.keys(links).forEach(linkId => {
        const link = document.getElementById(linkId);
        if (link) {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                console.log(`Clicked link: ${linkId}`);

                // Hide all sections
                Object.values(links).forEach(sectionId => {
                    const section = document.getElementById(sectionId);
                    if (section) {
                        section.classList.add("d-none");
                        console.log(`Hiding section: ${sectionId}`);
                    }
                });

                // Show the targeted section
                const targetSection = document.getElementById(links[linkId]);
                if (targetSection) {
                    targetSection.classList.remove("d-none");
                    console.log(`Showing section: ${links[linkId]}`);
                }
            });
        }
    });
};
