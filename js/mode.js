// Fonction pour calculer le thème préféré
function calculateSettingAsThemeString({ localStorageTheme, systemSettingDark }) {
    if (localStorageTheme !== null) {
      return localStorageTheme;
    }
  
    if (systemSettingDark.matches) {
      return "dark";
    }
  
    return "light";
  }
  
  // Fonction pour basculer le thème
  function toggleTheme() {
    const newTheme = currentThemeSetting === "dark" ? "light" : "dark";
  
    // Mise à jour du bouton et de l'aria-label
    const button = document.querySelector("[data-theme-toggle]");
    const newCta = newTheme === "dark" ? "Change to light theme" : "Change to dark theme";
    button.innerText = newCta;
    button.setAttribute("aria-label", newCta);
  
    // Mise à jour de l'attribut data-theme sur la balise HTML
    document.querySelector("html").setAttribute("data-theme", newTheme);
  
    // Mise à jour dans le stockage local
    localStorage.setItem("theme", newTheme);
  
    // Mise à jour de la variable currentThemeSetting en mémoire
    currentThemeSetting = newTheme;
  }
  
  // Récupération du thème sur le chargement de la page
  const localStorageTheme = localStorage.getItem("theme");
  const systemSettingDark = window.matchMedia("(prefers-color-scheme: dark)");
  
  let currentThemeSetting = calculateSettingAsThemeString({ localStorageTheme, systemSettingDark });
  
  // Écouteur d'événement pour le bouton de bascule
  const button = document.querySelector("[data-theme-toggle]");
  button.addEventListener("click", toggleTheme);
  