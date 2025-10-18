const Endpoints = {
    BASE: '/endpoint',
    AUTH: {
        LOGIN: '/endpoint/login',
        LOGOUT: '/endpoint/logout',
        REFRESH: '/endpoint/refresh'
    },

    // agrega aquí otros endpoints del proyecto
};

// export / global compatibility
if (typeof module !== 'undefined' && module.exports) {
    module.exports = Endpoints;
} else {
    window.Endpoints = Endpoints;
}