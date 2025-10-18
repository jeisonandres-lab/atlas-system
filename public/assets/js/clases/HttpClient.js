class HttpClient {
  constructor(options = {}) {
    this.baseUrl = options.baseUrl || '';
    this.onStart = typeof options.onStart === 'function' ? options.onStart : null;
    this.onFinish = typeof options.onFinish === 'function' ? options.onFinish : null;
  }

  __buildUrl(path) {
    if (!path) return this.baseUrl || '';
    // URL absoluta -> devolver tal cual
    if (/^https?:\/\//.test(path)) return path;
    // Si existe baseUrl, concatenar sin duplicar slashes
    if (this.baseUrl) {
      return this.baseUrl.replace(/\/+$/, '') + '/' + String(path).replace(/^\/+/, '');
    }
    // Si no hay baseUrl, devolver el path sin slash inicial
    return String(path).replace(/^\/+/, '');
  }

  async request(path, opts = {}) {
    const { method = 'GET', body = null } = opts;
    const url = this.__buildUrl(path);

    if (this.onStart) try { this.onStart(); } catch (_) { }

    const fetchOpts = { method, headers: { 'Accept': 'application/json' } };
    if (body != null) {
      if (body instanceof FormData) {
        fetchOpts.body = body;
      } else {
        fetchOpts.headers['Content-Type'] = 'application/json';
        fetchOpts.body = JSON.stringify(body);
      }
    }

    try {
      const res = await fetch(url, fetchOpts);
      const text = await res.text().catch(() => '');
      let data = null;
      if (text !== '') {
        try { data = JSON.parse(text); } catch (e) { data = text; }
      }

      const result = { ok: res.ok, status: res.status, data };

      if (this.onFinish) try { this.onFinish(null, result); } catch (_) { }

      if (!res.ok) return Promise.reject(result);
      return result;
    } catch (err) {
      if (this.onFinish) try { this.onFinish(err); } catch (_) { }
      return Promise.reject({ ok: false, status: 0, error: 'network' });
    }
  }

  get(path, opts = {}) {
    return this.request(path, Object.assign({}, opts, { method: 'GET' }));
  }

  post(path, body = null, opts = {}) {
    return this.request(path, Object.assign({}, opts, { method: 'POST', body }));
  }
}

export default HttpClient;