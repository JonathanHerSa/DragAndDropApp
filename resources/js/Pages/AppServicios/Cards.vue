<script setup>
import Momento from "moment";
import { computed } from "vue";
const props = defineProps({
    element: {
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
</script>
<template>
    <div>
        <div
            class="shadow text-white hover:cursor-pointer select-none px-4 py-2 rounded-2xl grid gap-1"
            :class="element.listas_id === 3 ? 'bg-[#41D3AC]' : color"
        >
            <div>
                <div class="flex justify-between gap-2">
                    <div class="flex gap-1">
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="43"
                                height="43"
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
                        <div class="flex flex-col justify-center items-stretch">
                            <h2 class="text-md">Electrodomestica</h2>
                            <h3 class="text-xs">{{ element.titulo }}</h3>
                        </div>
                    </div>
                    <!-- Lista 1 -->
                    <div
                        class="flex flex-col justify-end items-end"
                        v-if="element.listas_id === 1"
                    >
                        <h2 class="text-[0.6rem] justify-self-center">
                            Solicitado el
                        </h2>
                        <div class="flex gap-[0.15rem]">
                            <img
                                src="../../../../public/img/IconosServicios/reloj.svg"
                                alt=""
                                class="w-[0.5rem] self-center"
                            />
                            <h3 class="text-[.7rem]">
                                {{
                                    Momento(props.element.created_at)
                                        .locale("es-mx")
                                        .format("DD/MMM hh:mm a")
                                }}
                            </h3>
                        </div>
                    </div>
                    <!-- Fin lista 1 -->
                    <div
                        v-if="element.listas_id === 2"
                        class="flex flex-col justify-end items-end"
                    >
                        <h2 class="text-[0.6rem] justify-self-center">
                            Status
                        </h2>
                        <h3
                            class="text-[.5rem] rounded-3xl bg-white px-6 py-1 text-black"
                        >
                            En Proceso
                        </h3>
                    </div>
                    <!-- Fin lista 2 -->
                    <div
                        class="flex flex-col justify-end items-end"
                        v-if="element.listas_id === 3"
                    >
                        <div class="flex gap-2 justify-self-end">
                            <div class="self-center">
                                <h2 class="text-xs">Juan Gómez</h2>
                                <h3 class="text-[.5rem]">Ocupacion</h3>
                            </div>
                            <div>
                                <img
                                    class="max-w-[2.5rem]"
                                    src="../../../../public/img/IconosServicios/señor2.svg"
                                    alt=""
                                />
                            </div>
                        </div>
                    </div>
                    <!-- Fin lista 3 -->
                </div>
            </div>
            <div
                class="flex justify-between"
                v-if="element.Prov_id != null && element.listas_id != 3"
            >
                <div class="flex flex-col justify-center">
                    <h2 class="text-[0.6rem]">Asignado el</h2>
                    <div class="flex gap-[0.15rem]">
                        <img
                            src="../../../../public/img/IconosServicios/reloj.svg"
                            alt=""
                            class="w-[0.5rem] self-center"
                        />
                        <h3 class="text-[.7rem]">
                            {{
                                Momento(props.element.updated_at)
                                    .locale("es-mx")
                                    .format("DD/MMM hh:mm a")
                            }}
                        </h3>
                    </div>
                </div>
                <div class="flex gap-4 justify-self-end">
                    <div class="self-center">
                        <h2 class="text-sm">Juan Gómez</h2>
                        <h3 class="text-[.6rem]">Ocupacion</h3>
                    </div>
                    <div>
                        <img
                            class="max-w-[2.5rem]"
                            src="../../../../public/img/IconosServicios/señor2.svg"
                            alt=""
                        />
                    </div>
                </div>
            </div>
            <!-- Fin lista 2 -->
            <div
                class="flex justify-end gap-2 items-center"
                v-if="element.listas_id === 3"
            >
                <h2 class="text-xs">Finalizado el</h2>
                <div class="flex gap-[0.15rem]">
                    <img
                        src="../../../../public/img/IconosServicios/reloj.svg"
                        alt=""
                        class="w-[0.7rem] self-center"
                    />
                    <h3 class="text-xs">
                        {{
                            Momento(props.element.updated_at)
                                .locale("es-mx")
                                .format("DD/MMM hh:mm a")
                        }}
                    </h3>
                </div>
            </div>
            <!-- Fin lista 3 -->
        </div>
    </div>
</template>
<style scoped>
.drag > div {
    transform: rotate(3deg);
}
.ghost {
    background: lightgray;
    border-radius: 6px;
}
.ghost > div {
    visibility: hidden;
}
</style>
