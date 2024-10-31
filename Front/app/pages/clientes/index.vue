<script lang="ts" setup>
import { ref } from 'vue';
import MiCard from "~/components/personalized/MiCard.vue";
const { AlertCuestion, AlertSuccess, AlertError } = useSweetAlert2();
import Alerta from "~/components/Alerta.vue";

const cliente = useSanctumRequest();

const columnsItems = ref([
  {
    label: "Nombres",
    field: "nombres"
  },
  {
    label: "Apellidos",
    field: "apellidos"
  },
  {
    label: "Email",
    field: "email"
  },
  {
    label: "Telefono",
    field: "telefono"
  }
]);

columnsItems.value.push({
  label: 'Opciones',
  field: 'opciones',
  filterable: false,
  sortable: false,
  width: '150px'
});

let items = ref([]);
const alertMessage = ref('');
const alertType = ref('success'); // 'success' o 'error'

// Función para obtener los items
const getItems = async () => {
  try {
    let res = await cliente.get('/api/clientes');
    items.value = res.data;
  } catch (e) {
    console.error("Error al obtener clientes:", e.message);
    alertMessage.value = 'No se pudieron obtener los clientes.';
    alertType.value = 'error';
  }
};

// Llamar a getItems al cargar el componente
getItems();

const deleteItem = async (id: number) => {
  if ((await AlertCuestion('¿Estás seguro de eliminar este Cliente?')).isConfirmed) {
    try {
      let res = await cliente.delete('/api/clientes/' + id);

      // Asegúrate de que la respuesta tenga un mensaje
      const message = res.data?.message || 'El cliente ha sido eliminado correctamente.';
      alertMessage.value = message;
      alertType.value = 'success';

      // Actualizar la lista de clientes después de eliminar uno
      await getItems(); // Llama a getItems para refrescar la tabla
    } catch (e) {
      console.error("Error al eliminar cliente:", e.message);
      alertMessage.value = 'No se pudo eliminar el cliente.';
      alertType.value = 'error';
    }
  }
};

const active = useState('activeItem');
active.value = 'Cliente';
</script>

<template>
  <div class="text-right mb-4">
    <UButton
        icon="i-heroicons-pencil-square"
        size="sm"
        color="Blue"
        variant="solid"
        label="Nuevo"
        :trailing="false"
        to="clientes/create"
    />
  </div>

  <mi-card borderColor="#e74c3c">
    <UButton
        color="blue"
        variant="solid"
        icon="i-heroicons-user-add"
        @click="$router.push('/clientes/create')"
    >
      Crear Cliente
    </UButton>

    <vue-good-table
        :columns="columnsItems"
        :rows="items"
        :search-options="{ enabled: true }"
        :pagination-options="{ enabled: true, perPage: 5 }"
    >
      <template #table-row="props">
        <span v-if="props.column.field == 'opciones'">
          <UButton
              icon="i-heroicons-eye"
              size="sm"
              color="blue"
              variant="solid"
              class="mr-1"
              :to="'clientes/show/' + props.row.id"
          />
          <UButton
              icon="i-heroicons-pencil-square"
              size="sm"
              color="yellow"
              variant="solid"
              :to="'clientes/edit/' + props.row.id"
              class="mr-1"
          />
          <UButton
              icon="i-heroicons-trash"
              size="sm"
              color="red"
              variant="solid"
              @click="deleteItem(props.row.id)"
              class="mr-1"
          />
        </span>
        <span v-else>
          {{ props.formattedRow[props.column.field] }}
        </span>
      </template>
    </vue-good-table>

    <UButton
        type="button"
        color="red"
        variant="solid"
        label="Regresar"
        icon="i-heroicons-arrow-left-end-on-rectangle"
        @click="navigateTo('/')"
        class="mr-1"
    />

    <!-- Aquí muestra la alerta si hay un mensaje -->
    <Alerta v-if="alertMessage" :type="alertType">{{ alertMessage }}</Alerta>
  </mi-card>
</template>

<style scoped>
</style>
