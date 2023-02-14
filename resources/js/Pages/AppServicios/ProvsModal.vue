<script setup>
import Modal from "../../Components/Modal.vue";

const emit = defineEmits(["close", "valor"]);
let count = [
    {
        id: 1,
        nombre: "Juan Gomez",
        ocupacion: "Plomero",
    },
    {
        id: 2,
        nombre: "Pablo Lopez",
        ocupacion: "Carpintero",
    },
    {
        id: 3,
        nombre: "David Gutierrez",
        ocupacion: "Cerrajero",
    },
    {
        id: 4,
        nombre: "Pedor Perez",
        ocupacion: "Electricista",
    },
    {
        id: 5,
        nombre: "Manuel Diaz",
        ocupacion: "Jardinero",
    },
    {
        id: 6,
        nombre: "Mario Moreno",
        ocupacion: "Cantinflas",
    },
];
defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: "sm",
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    emit("close");
};
</script>
<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div class="flex flex-col gap-1 px-3 py-1">
            <div>
                <h2 class="text-[#074389] text-xl">Asignar</h2>
                <h3 class="text-lg">Proveedores Disponibles</h3>
            </div>
            <div class="flex flex-col overflow-y-auto p-4 max-h-[20.5rem]">
                <template v-for="i in count">
                    <div
                        class="last:border-none border-b border-gray-300 cursor-pointer hover:bg-[#074389]/10"
                    >
                        <button
                            class="flex w-full py-1 px-2 justify-between items-center focus:bg-[#074389]/20"
                            @click="this.$emit('valor', i)"
                        >
                            <div class="text-left">
                                <h2 class="text-[#074389] text-sm">
                                    {{ i.nombre }}
                                </h2>
                                <h3 class="text-xs">{{ i.ocupacion }}</h3>
                            </div>
                            <div>
                                <img
                                    src="../../../../public/img/IconosServicios/señor1.svg"
                                    alt=""
                                />
                            </div>
                        </button>
                    </div>
                </template>
            </div>
            <div class="flex justify-end px-3 py-1">
                <slot name="button" />
            </div>
        </div>
    </Modal>
</template>
