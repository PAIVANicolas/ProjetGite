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
  const checkbox = document.getElementById("darkmode-toggle");
  const newTheme = checkbox.checked ? "light" : "dark"; // Inversion du thème

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

// Écouteur d'événement pour la case à cocher
const checkbox = document.getElementById("darkmode-toggle");
checkbox.addEventListener("change", toggleTheme);

// Définir le thème initial sur la page chargée
document.querySelector("html").setAttribute("data-theme", currentThemeSetting);

// Cocher la case à cocher par défaut
checkbox.checked = currentThemeSetting === "light";
