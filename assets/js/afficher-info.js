const expandButton = document.querySelector(".expand-button");
const paragraph = document.querySelector(".paragraph");

let isExpanded = false;

expandButton.addEventListener("click", () => {
    isExpanded = !isExpanded;
    
    if (isExpanded) {
        paragraph.classList.add("expanded");
        expandButton.innerHTML = '<i class="fa-solid fa-chevron-up"></i>'; // Icône "Réduire"
    } else {
        paragraph.classList.remove("expanded");
        expandButton.innerHTML = '<i class="fa-solid fa-chevron-down"></i>'; // Icône "Dérouler"
    }
});
