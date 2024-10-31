<script lang="ts">
import { defineComponent } from 'vue';
import { FetchError } from 'ofetch';

export default defineComponent({
  name: 'LoginPage',
  data() {
    return {
      credentials: {
        email: '',
        password: '',
        remember: false,
      },
      errores: '',
    };
  },
  computed: {
    isAuthenticated() {
      const { isAuthenticated } = useSanctumAuth();
      return isAuthenticated.value;
    },
  },
  methods: {
    async loguearme() {
      this.errores = '';
      const { login } = useSanctumAuth();
      try {
        await login(this.credentials);
      } catch (e) {
        if (e instanceof FetchError && e.data) {
          this.errores = e.data.message || 'Auth Error.';
        } else {
          this.errores = 'Unexpected Error.';
        }
      }
    },

    async getUsers() {
      const client = useSanctumClient();
      const { data, error } = await useAsyncData('users', () =>
          client('/api/users')
      );
      if (error instanceof FetchError && error.data) {
        console.log(error.data);
      } else {
        this.errores = 'Unexpected Error.';
      }
    },
  },
  mounted() {
    console.log(this.isAuthenticated);
  },
  setup() {
    definePageMeta({
      layout: 'auth',
    });
    return {};
  },
});
</script>

<template>
  <div class="login-container">
    <h2>Iniciar Sesión</h2>

    <div class="input-group">
      <input type="text"
             v-model="credentials.email"
             placeholder="Email"
             class="input-field"
      >
    </div>

    <div class="input-group">
      <input type="password"
             v-model="credentials.password"
             placeholder="Contraseña"
             class="input-field"
      >
    </div>

    <button @click="loguearme" class="login-button">
      Ingresar
    </button>

    <p v-if="errores" class="error-message">
      {{ errores }}
    </p>
  </div>
</template>

<style scoped>
.login-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 400px;
  margin: 0 auto;
  padding: 2rem;
  border-radius: 8px;
  background-color: #f8f8f8;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
  margin-bottom: 1.5rem;
  font-size: 1.5rem;
  color: #333;
}

.input-group {
  width: 100%;
  margin-bottom: 1rem;
}

.input-field {
  width: 100%;
  padding: 0.8rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
  outline: none;
}

.input-field:focus {
  border-color: #007bff;
}

.login-button {
  width: 100%;
  padding: 0.8rem;
  font-size: 1rem;
  color: #fff;
  background-color: #007bff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.login-button:hover {
  background-color: #0056b3;
}

.error-message {
  color: red;
  margin-top: 1rem;
}
</style>
