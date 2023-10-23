function toggleExpand() {
    const expandButton = document.querySelector(".expand-button");
    const paragraph = document.querySelector(".paragraph");
    let isExpanded = paragraph.classList.contains("expanded");

    if (isExpanded) {
        paragraph.classList.remove("expanded");
        expandButton.innerHTML = '<i class="fa-solid fa-chevron-down"></i>'; // Icône "Dérouler"
    } else {
        paragraph.classList.add("expanded");
        expandButton.innerHTML = '<i class="fa-solid fa-chevron-up"></i>'; // Icône "Réduire"
    }
}


function toggleExpandService() {
    //conplete

    if (isExpanded) {
        //conplete
        expandButton.innerHTML = '<i class="fa-solid fa-chevron-down"></i>'; // Icône "Dérouler"
    } else {
        //conplete
        expandButton.innerHTML = '<i class="fa-solid fa-chevron-up"></i>'; // Icône "Réduire"
    }
}

