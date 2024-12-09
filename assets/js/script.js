<script>
    // Sélection des éléments
    const form = document.querySelector("form");
    const notification = document.querySelector(".notification");

    // Événement de soumission du formulaire
    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Empêche le rechargement de la page
        notification.classList.add("show"); // Affiche la notification

        // Masque la notification après 3 secondes
        setTimeout(() => {
            notification.classList.remove("show");
        }, 3000);

        // Réinitialise le formulaire
        form.reset();
    });
</script>