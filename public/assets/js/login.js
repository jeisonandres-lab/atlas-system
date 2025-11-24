import HttpClient from './clases/HttpClient.js';
import Alertas from './clases/Alertas.js';
import { qs } from './utils/dom.js';
import { showSpinner, hideSpinner } from './utils/leading.js';

/**
 * LoginManager handles the login page logic including form submission,
 * validation, and UI interactions.
 */
class LoginManager {
  constructor() {
    this.client = new HttpClient();
    this.alertas = new Alertas();
    this.form = qs('.formularioEnviar');
    this.passwordInput = qs('#password');
    this.usuarioInput = qs('#usuario');

    this.init();
  }

  /**
   * Initialize event listeners and initial UI state.
   */
  init() {
    if (this.form) {
      this.form.addEventListener('submit', (e) => this.handleSubmit(e));
    }

    // Activar toggle de contraseña
    this.setupPasswordToggle();
  }

  /**
   * Sets up the show/hide password functionality.
   */
  setupPasswordToggle() {
    document.addEventListener('click', (e) => {
      const toggleBtn = e.target.closest('.password-toggle-icon');
      if (!toggleBtn) return;

      const inputContainer = toggleBtn.parentElement;
      const pwd = inputContainer.querySelector('input');
      if (!pwd) return;

      const isText = pwd.type === 'text';
      pwd.type = isText ? 'password' : 'text';

      toggleBtn.classList.toggle('fa-eye-slash', !isText);
      toggleBtn.classList.toggle('fa-eye', isText);
    });
  }

  /**
   * Handles the form submission.
   * @param {Event} e 
   */
  async handleSubmit(e) {
    e.preventDefault();

    const formData = new FormData(this.form);
    const usuario = (formData.get('user') || '').trim();
    const password = (formData.get('pass') || '').trim();

    if (!this.validateForm(usuario, password)) return;

    try {
      showSpinner();
      const payload = { usuario, password };

      // Note: Ideally, the backend should accept JSON or FormData directly.
      // Keeping the existing query param structure for compatibility.
      const res = await this.client.post('src/requests/auth.php?modulo_usuario=logear', payload);

      const status = res?.status ?? 0;
      const data = res?.data ?? null;

      if (status === 200 && data?.ok) {
        this.handleLoginSuccess(data.user);
      } else {
        // Fallback if status is 200 but ok is false (if backend does that)
        this.alertas.AlertMix('warning', 'Credenciales inválidas', 'top', 3000);
      }
    } catch (err) {
      this.handleLoginError(err);
    } finally {
      // Ensure spinner is hidden even if logic above doesn't explicitly hide it in all paths
      // (though success usually redirects)
      if (!window.location.href.includes('inicio')) {
        hideSpinner();
      }
    }
  }

  /**
   * Validates the form inputs.
   * @param {string} usuario 
   * @param {string} password 
   * @returns {boolean} True if valid, false otherwise.
   */
  validateForm(usuario, password) {
    if (!usuario && !password) {
      this.alertas.AlertMix('error', 'Campos vacíos', 'top', 3000);
      return false;
    }
    if (!usuario) {
      this.alertas.AlertMix('warning', 'Debe colocar nombre de usuario', 'top', 3000);
      return false;
    }
    if (!password) {
      this.alertas.AlertMix('warning', 'Debe colocar contraseña', 'top', 3000);
      return false;
    }
    return true;
  }

  /**
   * Handles successful login.
   * @param {Object} user 
   */
  handleLoginSuccess(user) {
    hideSpinner();
    if (user?.activo === 1) {
      this.alertas.AlertMix('success', `Bienvenido ${user.nameUser}`, 'top', 3000, () => {
        window.location.replace("inicio");
      });
      this.setFieldStatus('success');
    } else {
      this.alertas.AlertMix('warning', 'Este usuario ya está activo', 'top', 4000);
    }
  }

  /**
   * Handles login errors.
   * @param {Object} err 
   */
  handleLoginError(err) {
    console.error('Login error:', err);
    hideSpinner();

    const message = err?.data?.message || 'Ocurrió un error inesperado';

    if (err?.status === 401) {
      this.alertas.AlertMix('error', message, 'top', 4000);
      this.setFieldStatus('error');
    } else {
      this.alertas.AlertMix('error', message, 'top', 3000);
    }
  }

  /**
   * Updates the visual status of input fields.
   * @param {'success'|'error'} status 
   */
  setFieldStatus(status) {
    const color = status === 'success' ? '#198754' : '#dc3545';
    if (this.usuarioInput) this.usuarioInput.style.border = `1px solid ${color}`;
    if (this.passwordInput) this.passwordInput.style.border = `1px solid ${color}`;
  }
}

// Auto-initialize when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => new LoginManager());
} else {
  new LoginManager();
}