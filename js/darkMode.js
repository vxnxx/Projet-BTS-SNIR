function tgm() {

    // Cette condition vérifie si la valeur de la propriété CSS "--bg-color" est "white" ou vide.
    if(document.documentElement.style.getPropertyValue('--bg-color') == "white" || document.documentElement.style.getPropertyValue('--bg-color') == "") {

        // Si la condition est vraie, alors les propriétés CSS suivantes sont définies pour l'élément racine et certains autres éléments de la page.
        document.documentElement.style.setProperty("--bg-color", "#0b1120");
        document.documentElement.style.setProperty("--text-color", "white");
        document.documentElement.style.setProperty("--bg-opacity", "1");
        document.getElementsByClassName("cls-3")[0].style.fill = "white";
        document.documentElement.style.setProperty("--input-color", "#1e293b");
        document.documentElement.style.setProperty("--input-border", "#616161");
        document.documentElement.style.setProperty("--slogan-color", "#8a8a8a");
        document.documentElement.style.setProperty("--input-text-color", "white");
        document.documentElement.style.setProperty("--grid-color", "616161");
        document.getElementById("img").src = img.src.replace("img/dark.png", "img/light.png");
        document.getElementById("img").style.filter = "invert(1)";
        localStorage.setItem("darkMode", "true");

    } else {

        // Si la condition est fausse, alors les propriétés CSS suivantes sont définies pour l'élément racine et certains autres éléments de la page.
        document.documentElement.style.setProperty("--bg-color", "white");
        document.documentElement.style.setProperty("--text-color", "black");
        document.documentElement.style.setProperty("--bg-opacity", "0.35");
        document.getElementsByClassName("cls-3")[0].style.fill = "black";
        document.documentElement.style.setProperty("--input-color", "white");
        document.documentElement.style.setProperty("--input-border", "#e5e7eb");
        document.documentElement.style.setProperty("--slogan-color", "rgb(71 85 105/1)");
        document.documentElement.style.setProperty("--input-text-color", "black");
        document.documentElement.style.setProperty("--grid-color", "#0000002d");
        document.getElementById("img").src = img.src.replace("img/light.png", "img/dark.png");
        document.getElementById("img").style.filter = "invert(0)";
        localStorage.setItem("darkMode", "false");
    }
}