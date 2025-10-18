// Función para generar un hash seguro con sal
export function generarHashContrasena(contrasena) {
    // Generar una sal aleatoria de 16 bytes (32 caracteres hexadecimales)
    const salt = CryptoJS.lib.WordArray.random(16).toString(CryptoJS.enc.Hex);
    const hash = CryptoJS.SHA256(contrasena + salt).toString(CryptoJS.enc.Hex);
    // Devolver el hash y la sal por separado
    return {
        hash: hash,
        salt: salt
    };
}

// Función para verificar una contraseña
export function verificarContrasena(contrasena, hashAlmacenado, saltAlmacenada) {
    // Reconstruir el hash original con la sal almacenada
    const hashCalculado = CryptoJS.SHA256(contrasena + saltAlmacenada).toString(CryptoJS.enc.Hex);
    // Comparar los hashes
    return hashCalculado === hashAlmacenado;
}