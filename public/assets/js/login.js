import HttpClient from './clases/HttpClient.js';
import { AlertMix } from './utils/alerts.js';
import { qs } from './utils/dom.js';

// manejarVisibilidadPassword alterna el tipo del input password y cambia el icono
function manejarVisibilidadPassword() {
  document.addEventListener('click', (e) => {
    // Buscar el botón más cercano con la clase .password
    const btn = e.target.closest('.password');
    if (!btn) return; // si el click no vino de un toggler, salir
    const pwd = qs('#password'); // input de la contraseña
    if (!pwd) return; // si no existe input, salir

    // Alternar tipo del input
    const isText = pwd.type === 'text';
    pwd.type = isText ? 'password' : 'text';

    // Actualizar icono (opcional, sólo si existe <i> dentro del botón)
    const icon = btn.querySelector('i');
    if (icon) {
      icon.classList.toggle('fa-key', !isText);
      icon.classList.toggle('fa-lock', isText);
    }
  });
}

// manejarEnvioFormulario enviar la petición de login al backend
async function manejarEnvioFormulario(e) {
  // Evitar comportamiento por defecto (navegación/recarga)
  e.preventDefault();

  // Leer valores desde el DOM usando qs (importado desde utils/dom.js)
  const usuario = (qs('#usuario')?.value || '').trim();
  const password = (qs('#password')?.value || '').trim();

  // Validaciones simples y mensajes al usuario
  if (!usuario && !password) {
    AlertMix('error', 'Campos vacíos', 'top', 3000);
    return;
  }
  if (!usuario) {
    AlertMix('warning', 'Debe colocar nombre de usuario', 'top', 3000);
    return;
  }
  if (!password) {
    AlertMix('warning', 'Debe colocar contraseña', 'top', 3000);
    return;
  }

  // Instancia de HttpClient (versión mínima). No pasamos onStart/onFinish aquí.
  const client = new HttpClient();

  try {
    // Preparar y enviar petición al endpoint de autenticación
    const payload = { usuario: usuario, password: password };
    // Ruta relativa a tu proyecto; ajustar si usas baseUrl en HttpClient
    const res = await client.post('src/requests/auth.php?modulo_usuario=logear', payload);

    // Validar estructura de respuesta esperada
    if (res && res.status === 200 && res.data && res.data.ok) {
      const user = res.data.user || {};

      // Si el campo 'activo' es 1 -> permitir acceso
      if (user.activo === 1) {
        // Mostrar bienvenida con el nombre (nameUser) y redirigir
        AlertMix('success', `Bienvenido ${user.nameUser}`, 'top', 3000);
        setTimeout(() => { window.location.replace('inicio'); }, 3000);
      } else {
        // Usuario inactivo o ya conectado
        AlertMix('warning', 'Este usuario ya esta activo', 'top', 4000);
      }
    } else {
      // Respuesta negativa del servidor: mostrar mensaje retornado o genérico
      const mensaje = (res && res.data && res.data.message) ? res.data.message : 'Credenciales incorrectas';
      AlertMix('error', mensaje, 'top', 4000);
    }
  } catch (err) {
    // Errores de red / excepciones: log y notificación genérica
    console.log('Login error object:', err);
    console.error('Login error:', err);
    AlertMix('error', 'Error en la conexión', 'top', 3000);
  }
}

// Inicialización de listeners y configuración inicial
function inicializar() {
  const form = qs('.formularioEnviar');
  if (form) form.addEventListener('submit', manejarEnvioFormulario); // listener directo al form
  manejarVisibilidadPassword(); // configurar delegación para toggle
}

// Auto-inicializar según el estado del DOM
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', inicializar);
} else {
  inicializar();
}