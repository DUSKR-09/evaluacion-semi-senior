// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  srcDir: 'app',
  typescript: {
    shim: false
  },
  plugins: [
    '~/plugins/vue-good-table-next.js',
  ],
  compatibilityDate: '2024-04-03',
  devtools: { enabled: true },
  modules: ['@nuxt/ui', 'nuxt-auth-sanctum'],

  sanctum: {
    mode: 'token',
    baseUrl: 'http://back.local/',
    userStateKey: 'sanctum.user.identity',
    redirectIfAuthenticated: true,
    redirectIfUnauthenticated: true,
    endpoints: {
      csrf: 'sanctum/csrf-cookie',
      login: 'api/auth/login',
      logout: 'api/auth/logout',
      user: 'api/user',
    },
    csrf: {
      cookie: 'XSRF-TOKEN',
      header: 'X-XSRF-TOKEN',
    },
    client: {
      retry: false,
    },
    redirect: {
      keepRequestedRoute: false,
      onLogin: '/',
      onLogout: '/auth/login',
      onAuthOnly: '/auth/login',
      onGuestOnly: '/',
    },
    globalMiddleware: {
      enabled: true,
    },
    logLevel: 3,
  }
})