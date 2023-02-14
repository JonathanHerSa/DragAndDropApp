<script setup>
import Modal from "../../Components/Modal.vue";

const emit = defineEmits(["close"]);

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
    elem: {
        type: Object,
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
        <div class="flex flex-col gap-4 px-3 py-1">
            <div>
                <h1 class="text-center text-[#074389] text-2xl">
                    ¡El servicio se asigno correctamente!
                </h1>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-[#074389] text-md font-light">
                        {{ elem.nombre }}
                    </h2>
                    <h3 class="text-sm font-light">{{ elem.ocupacion }}</h3>
                </div>
                <div>
                    <img
                        src="../../../../public/img/IconosServicios/señor1.svg"
                        alt=""
                    />
                </div>
            </div>
            <div class="flex justify-center">
                <slot name="button" />
            </div>
        </div>
    </Modal>
</template>
