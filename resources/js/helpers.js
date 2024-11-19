export function canPermiso(permisos, permisoBuscado) {
    // Using a Set for faster lookup
    const permisosSet = new Set(permisos);
    return permisosSet.has(permisoBuscado);
}