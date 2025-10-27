import { qs } from "./dom.js";

/**
 * Muestra el loading con id "spinner" (display: flex)
 * Devuelve true si el elemento existe y pudo mostrarse.
 */
export function showSpinner() {
  const el =  qs('#spinner');
  if (!el) return false;
  el.style.display = 'flex';
  el.setAttribute('aria-hidden', 'false');
  return true;
}

/**
 * Oculta el loading con id "spinner" (display: none)
 * Devuelve true si el elemento existe y pudo ocultarse.
 */
export function hideSpinner() {
  const el =  qs('#spinner');
  if (!el) return false;
  el.style.display = 'none';
  el.setAttribute('aria-hidden', 'true');
  return true;
}
