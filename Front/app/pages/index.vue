<script setup lang="ts">
import MiCard from "~/components/personalized/MiCard.vue";

definePageMeta({
  title: 'Dashboard',
  layout: 'default',
});

const cliente = useSanctumRequest();
const user = useSanctumUser();
// const {notifyError} = useToastNotifications();

const {logout} = useSanctumAuth();
</script>

<template>
  <mi-card>
    <template #header>
      <h1>Hola, {{ user?.nombre_completo }}</h1>

      <UButton @click="logout" color="red"
      block>
        Cerrar Sesión
      </UButton>
    </template>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div class="flex flex-col space-y-2">
        <mi-card>
          <template #header>
            <h1 style="color: blue;">Clientes</h1>
            <NuxtLink to="/clientes/create" class="text-blue-500 underline">
              Crear Cliente
            </NuxtLink>
          </template>

          <template #text>
            <!-- Enlace a la página de clientes -->
            <NuxtLink to="/clientes" class="text-blue-500 underline">
              Ver todos los clientes
            </NuxtLink>

          </template>

        </mi-card>
      </div>
    </div>
  </mi-card>
</template>
