<script setup>
import Modal from "../../Components/Modal.vue";
import { computed } from "vue";

const emit = defineEmits(["close"]);

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: "xl",
    },
    closeable: {
        type: Boolean,
        default: true,
    },
    elem: {
        type: Object,
    },
    color: {
        type: Number,
    },
});

const color = computed(() => {
    return {
        1: "bg-[#F28484]",
        2: "bg-[#FDB047]",
        3: "bg-[#FAD24B]",
        4: "bg-[#41D3AC]",
    }[props.color];
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
        <div
            class="w-full flex justify-between items-center px-2 py-1"
            :class="elem.listas_id === 3 ? 'bg-[#41D3AC]' : color"
        >
            <div class="flex justify-around gap-1">
                <div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="63"
                        height="63"
                        viewBox="0 0 53 53"
                    >
                        <circle
                            id="Elipse_22"
                            data-name="Elipse 22"
                            cx="26.5"
                            cy="26.5"
                            r="26.5"
                            fill="#fff"
                        />
                    </svg>
                </div>
                <div
                    class="flex flex-col justify-center items-start text-white"
                >
                    <h2 class="text-lg">{{ elem.titulo }}</h2>
                    <h3 class="text-xl">Lavanderia</h3>
                </div>
            </div>
        </div>
        <div class="mx-2 grid grid-cols-2 gap-2 mt-4">
            <div class="flex flex-col gap-2 pb-3">
                <div class="grid justify-between gap-8">
                    <div>
                        <h2 class="text-sm text-gray-500">Descripcion:</h2>
                        <p class="text-base">
                            Aqui vamos a colocar la descripcion general del
                            problema y es necesario que haya suficiente
                            informacion para que el encargado de revisar el
                            problema pueda determinarlo
                        </p>
                    </div>
                    <div class="text-white">
                        <div
                            class="px-3 py-1 rounded-3xl flex gap-2 items-center max-w-fit"
                            :class="
                                elem.listas_id === 3 ? 'bg-[#41D3AC]' : color
                            "
                        >
                            <div>
                                <img
                                    src="../../../../public/img/IconosServicios/reloj.svg"
                                    alt=""
                                />
                            </div>
                            <div><p>Critico</p></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-start gap-1">
                    <div class="flex items-center gap-1">
                        <div>
                            <img
                                class="bg-indigo-300 rounded-full w-8"
                                src="../../../../public/img/IconosServicios/perfil.png"
                                alt=""
                            />
                        </div>
                        <div class="flex flex-col">
                            <h2 class="text-sm font-semibold">
                                Nombre de usuario
                            </h2>
                            <p class="text-xs">
                                Privada de los campos #234, Queretaro
                            </p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-1"
                        v-if="elem.Prov_id != null"
                    >
                        <div>
                            <img
                                class="bg-indigo-300 rounded-full w-8"
                                src="../../../../public/img/IconosServicios/señor1.svg"
                                alt=""
                            />
                        </div>
                        <div class="flex flex-col">
                            <h2 class="text-sm font-semibold">
                                Nombre de proveedor
                            </h2>
                            <p class="text-xs">Ocupacion</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col pb-3 gap-3 justify-between">
                <div>
                    <img src="../../../../public/img/login.jpg" alt="" />
                </div>
                <div
                    v-if="elem.listas_id != 3 && elem.Prov_id != null"
                    class="flex flex-col self-start"
                >
                    <h2 class="text-xs text-gray-500">Status</h2>
                    <h3 class="text-md">En Proceso</h3>
                </div>
                <div class="flex justify-end">
                    <slot name="button" />
                </div>
            </div>
        </div>
    </Modal>
</template>
