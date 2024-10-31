<script lang="ts" setup>
import { reactive, ref } from 'vue';
import { object, string, InferType } from 'yup';
import type { FormSubmitEvent } from '#ui/types';
import MiCard from "~/components/personalized/MiCard.vue";
import Alerta from "~/components/Alerta.vue"; // Importa el componente de alerta

const schema = object({
  nombres: string().required("Este campo es requerido"),
  apellidos: string().required("Este campo es requerido"),
  email: string().required("Este campo es requerido"),
  telefono: string().required("Este campo es requerido")
});

const state = reactive({
  nombres: undefined,
  apellidos: undefined,
  email: undefined,
  telefono: undefined
});

const cliente = useSanctumRequest();
const formRef = ref();
const alertMessage = ref('');
const alertType = ref('success'); // 'success' o 'error'

const onSubmit = async (event: FormSubmitEvent<InferType<typeof schema>>) => {
  try {
    let res = await cliente.post('/api/clientes', state);
    alertMessage.value = res.data.message; // Mensaje de éxito
    alertType.value = 'success';
    navigateTo('/clientes');
  } catch (e) {
    alertMessage.value = e.message; // Mensaje de error
    alertType.value = 'error';
  }
};

const formatearCampoLabel = (str: string) => {
  return str
      .split('_')
      .filter(word => word.toLowerCase() !== 'id')
      .map(word => word.charAt(0).toUpperCase() + word.slice(1))
      .join(' ');
}

function submitForm() {
  if (formRef.value) {
    formRef.value.submit();
  }
}

const valoresInputFormulario1 = ref([
  { label: "Nombres", type: "text", key: "nombres" },
  { label: "Apellidos", type: "text", key: "apellidos" },
  { label: "Email", type: "text", key: "email" },
  { label: "Telefono", type: "text", key: "telefono" }
]);

const active = useState('activeItem');
active.value = 'Cliente';
</script>

<template>
  <mi-card>
    <UForm :schema="schema"
           :state="state"
           class="space-y-4"
           @submit="onSubmit"
           ref="formRef">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <template v-for="(field, index) in valoresInputFormulario1" :key="index">
          <div class="flex flex-col space-y-2">
            <UFormGroup :label="field.label + ':'" :name="field.key">
              <UInput v-if="field.type === 'text' || field.type === 'number' || field.type === 'date'"
                      v-model="state[field.key]"
                      :type="field.type" />
              <UCheckbox v-if="field.type === 'checkbox'"
                         v-model="state[field.key]"
                         name="notifications" />
            </UFormGroup>
          </div>
        </template>
      </div>
    </UForm>

    <template #footer>
      <div>
        <UButton type="button"
                 color="red"
                 variant="solid"
                 label="Regresar"
                 icon="i-heroicons-arrow-left-end-on-rectangle"
                 @click="navigateTo('/')"
                 class="mr-1" />
        <UButton type="button"
                 label="Guardar"
                 icon="i-heroicons-bookmark-square"
                 @click="submitForm" />
      </div>
    </template>

    <!-- Aquí muestra la alerta si hay un mensaje -->
    <Alerta v-if="alertMessage" :type="alertType">{{ alertMessage }}</Alerta>
  </mi-card>
</template>
