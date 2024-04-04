function login() {

}
function mostrarProcessando() {
    var divProcessando = document.createElement("div");
    divProcessando.id = "processandoDiv";
    divProcessando.style.position = "fixed";
    divProcessando.style.top = "85%";
    divProcessando.style.left = "16.5%";
    divProcessando.style.transform = "translate(-50%, -50%)";
    divProcessando.innerHTML =
        '<img src="./img/loading.gif" width="200px" alt="Processando..." title="Processando...">';
    tobias.appendChild(divProcessando);
}
function esconderProcessando() {
    const divProcessando = document.getElementById("processandoDiv");
    if (divProcessando) {
        tobias.removeChild(divProcessando);
    }
}