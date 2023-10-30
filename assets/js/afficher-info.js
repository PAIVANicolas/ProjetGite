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
    const expandButton = document.getElementById("expand-service");
    const list2 = document.querySelector(".service");

    let isExpanded = list2.classList.contains("expanded");

    if (isExpanded) {
        list2.classList.remove("expanded");
        expandButton.innerHTML = '<i class="fa-solid fa-chevron-down"></i>'; // Icône "Dérouler"
    } else {
        list2.classList.add("expanded");
        expandButton.innerHTML = '<i class="fa-solid fa-chevron-up"></i>'; // Icône "Réduire"
    }
}

