const expandButton = document.querySelector(".expand-button");
const paragraph = document.querySelector(".paragraph");

let isExpanded = false;

expandButton.addEventListener("click", () => {
    isExpanded = !isExpanded;
    
    if (isExpanded) {
        paragraph.classList.add("expanded");
        expandButton.textContent = "Réduire";
    } else {
        paragraph.classList.remove("expanded");
        expandButton.textContent = "Afficher plus";
    }
});
