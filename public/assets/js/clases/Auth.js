class Auth {
    constructor(options = {}) {
        this.baseUrl = options.baseUrl || '/endpoint'; // carpeta donde enviar
        this.loginPath = options.loginPath || '/login';
    }

    validate({ username = '', password = '' } = {}) {
        const errors = [];
        const userTrim = String(username).trim();

        if (!userTrim) {
            errors.push({ field: 'username', message: 'El nombre de usuario es obligatorio.' });
        } else if (userTrim.length < 3) {
            errors.push({ field: 'username', message: 'El nombre de usuario debe tener al menos 3 caracteres.' });
        }

        if (!password) {
            errors.push({ field: 'password', message: 'La contraseña es obligatoria.' });
        } else if (String(password).length < 6) {
            errors.push({ field: 'password', message: 'La contraseña debe tener al menos 6 caracteres.' });
        }

        return { valid: errors.length === 0, errors };
    }

    async login(credentials = {}) {
        const validation = this.validate(credentials);
        if (!validation.valid) {
            return Promise.reject({ type: 'validation', errors: validation.errors });
        }

        const url = this.baseUrl.replace(/\/$/, '') + this.loginPath;
        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                credentials: 'same-origin',
                body: JSON.stringify({
                    username: String(credentials.username).trim(),
                    password: credentials.password
                })
            });

            let payload = null;
            try { payload = await res.json(); } catch (e) { payload = null; }

            if (!res.ok) {
                const error = payload || { status: res.status, statusText: res.statusText };
                return Promise.reject({ type: 'server', error });
            }

            if (payload && payload.token) this.setToken(payload.token);
            return payload;
        } catch (err) {
            return Promise.reject({ type: 'network', error: err });
        }
    }

}

if (typeof module !== 'undefined' && module.exports) {
    module.exports = Auth;
}