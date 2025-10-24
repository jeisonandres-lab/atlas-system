import HttpClient from './clases/HttpClient.js';
import Alertas from './clases/Alertas.js';
import { qs, qsa } from './utils/dom.js';

const AlertasClient = new Alertas(); // instancia de Alertas
const client = new HttpClient(); // instancia de HttpClient

// manejarVisibilidadPassword alterna el tipo del input password y cambia el icono
function manejarVisibilidadPassword() {
  document.addEventListener('click', (e) => {


    const inputpass = e.target.closest('.password__input');
    if (inputpass) {
      qs('.i-close').style.display = 'block';
    }

    const btn = e.target.closest('.password');
    if (!btn) return;
    const pwd = qs('#password');
    if (!pwd) return;

    const isText = pwd.type === 'text';
    pwd.type = isText ? 'password' : 'text';

    const icon = qs('.password');
    if (icon) {
      icon.classList.toggle('fa-eye-slash', !isText);
      icon.classList.toggle('fa-eye', isText);
    }
  });
}

// UI: abrir/cerrar panel informativo (expuesto globalmente para onclick inline)
function openLoginInfo() {
  qsa('.b-form').forEach(el => el.style.opacity = '0.01');
  qsa('.box-form').forEach(el => el.style.left = '-37%');
  qsa('.box-info').forEach(el => el.style.right = '-37%');
}

function closeLoginInfo() {
  qsa('.b-form').forEach(el => el.style.opacity = '1');
  qsa('.box-form').forEach(el => el.style.left = '0px');
  qsa('.box-info').forEach(el => el.style.right = '-5px');
}
// Exponer en window para compatibilidad si hay onclick inline en el HTML
window.openLoginInfo = openLoginInfo;
window.closeLoginInfo = closeLoginInfo;

// ocultar spans de estado
function ocultarSpansEn(element) {
  if (!element) return;
  element.qsa('span').forEach(s => {
    s.style.display = 'none';
    s.classList.remove('i-warning');
  });
}

// manejarEnvioFormulario enviar la petición de login al backend
async function manejarEnvioFormulario(e) {
  e.preventDefault();

  const usuarioInput = qs('#usuario');
  const passwordInput = qs('#password');
  const usuario = (usuarioInput?.value || '').trim();
  const password = (passwordInput?.value || '').trim();

  if (!usuario && !password) {
    AlertasClient.AlertMix('error', 'Campos vacíos', 'top', 3000);
    return;
  }
  if (!usuario) {
    AlertasClient.AlertMix('warning', 'Debe colocar nombre de usuario', 'top', 3000);
    return;
  }
  if (!password) {
    AlertasClient.AlertMix('warning', 'Debe colocar contraseña', 'top', 3000);
    return;
  }

  try {
    const payload = { usuario, password };
    const res = await client.post('src/requests/auth.php?modulo_usuario=logear', payload);

    // Si tu HttpClient ya devuelve { status, data } mantenlo; si no, adapta para obtener status y body
    const status = res?.status ?? 0;
    const data = res?.data ?? null;

    if (status === 200 && data && data.ok) {
      const user = data.user || {};
      if (user.activo === 1) {
        AlertMix('success', `Bienvenido ${user.nameUser}`, 'top', 3000);
        if (usuarioInput) usuarioInput.style.border = '1px solid #198754';
        if (passwordInput) passwordInput.style.border = '1px solid #198754';
        // window.location.replace('inicio');
      } else {
        AlertMix('warning', 'Este usuario ya está activo', 'top', 4000);
      }
      return;
    }

  } catch (err) {
    console.error('Login error:', err.status);
    // Manejo de 401 u otros estados
    if (err.status === 401) {
      AlertMix('error', err.data.message, 'top', 4000);

      if (usuarioInput) usuarioInput.style.border = '1px solid #dc3545';
      if (passwordInput) passwordInput.style.border = '1px solid #dc3545';
      return;
    }
    AlertMix('error', err.data.message, 'top', 3000);
  }
}

// Inicialización de listeners y configuración inicial
function inicializar() {
  const form = qs('.formularioEnviar');
  const loginBtn = qs('#do_login');
  if (form) form.addEventListener('submit', manejarEnvioFormulario);

  if (loginBtn) {
    loginBtn.addEventListener('click', () => {
      // Solo UI: cerrar info y ocultar spans en el contenedor del botón
      closeLoginInfo();
      ocultarSpansEn(loginBtn.parentElement);
    });
  }

  // animaciones iniciales (solo visual)
  openLoginInfo();
  setTimeout(closeLoginInfo, 1000);

  // delegados / utilidades
  manejarVisibilidadPassword();

  // resize: asegurar estado cerrado
  window.addEventListener('resize', () => {
    closeLoginInfo();
  });
}

// Auto-inicializar según el estado del DOM
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', inicializar);
} else {
  inicializar();
}