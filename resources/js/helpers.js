export function canPermiso(permisos, permisoBuscado) {
    // Using a Set for faster lookup
    const permisosSet = new Set(permisos);
    return permisosSet.has(permisoBuscado);
}

export function formatDate(dateString) {
    const date = new Date(dateString);
    const dia = date.getDate();
    const n_mes = date.getMonth();
    const anio = date.getFullYear();

    return `${dia}/${n_mes}/${anio}`;
}

export function formatTime(dateString) {
    const date = new Date(dateString);
    let hora = date.getHours();
    const minuto = date.getMinutes();
    const segundo = date.getSeconds();
    const amPm = hora >= 12 ? "PM" : "AM";
    hora = hora % 12;
    hora = hora ? hora : 12;
    return `${hora}:${minuto} ${amPm}`;
}

export function formatDateTime(dateString) {
    const fecha = formatDate(dateString);
    const hora = formatTime(dateString);
    return `${fecha}, ${hora}`;
}