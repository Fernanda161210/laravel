function toggleEdit() {
    const section = document.getElementById("editProfile");

    if (!section) return;

    if (section.style.display === "flex") {
        section.style.display = "none";
    } else {
        section.style.display = "flex";
        section.scrollIntoView({ behavior: "smooth", block: "start" });
    }
}