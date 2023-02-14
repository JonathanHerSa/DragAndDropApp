<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import CardsModal from "../Pages/AppServicios/CardsModal.vue";
import ProvsModal from "../Pages/AppServicios/ProvsModal.vue";
import AsigModal from "../Pages/AppServicios/Asignado.vue";
import Boton from "../Pages/AppServicios/Button.vue";
import Dragable from "vuedraggable";
import Cards from "../Pages/AppServicios/Cards.vue";

const props = defineProps(["listas", "elementos"]);
const elm = ref(props.elementos);
const card = ref(false);
const provs = ref(false);
const prov = ref();
const asign = ref(false);
const elem = "";

const form = useForm({
    element: "",
    list: "",
    prov: "",
    position: "",
});

const submit = () => {
    form.transform((data) => ({
        ...data,
    })).post(route("elem.store"), {
        onFinish: () => {
            closeModal();
        },
    });
};

const closeModal = () => {
    card.value = false;
    provs.value = false;
    asign.value = false;
    form.reset();
};

function AsignProv(value) {
    prov.value = value;
}
</script>

<template>
    <div class="bg-gradient-to-b from-[#A8C3EF]">
        <form
            class="flex gap-6 justify-between p-4 mx-4"
            @submit.prevent="submit"
        >
            <template v-for="lista in listas">
                <div class="bg-white rounded-3xl shadow-2xl h-screen w-full">
                    <Dragable
                        :list="elm[lista.nombre]"
                        group="elementos"
                        item-key="id"
                        animation="300"
                        tag="div"
                        class="grid gap-2 items-start content-start px-3 py-1"
                        drag-class="drag"
                        ghost-class="ghost"
                        @drop="form.list = lista.id"
                        @end="submit()"
                    >
                        <template #header>
                            <h2
                                class="text-xl select-none font-semibold text-[#074389] ml-4 mb-1"
                            >
                                {{ lista.nombre }}
                            </h2>
                        </template>
                        <template #item="{ element }">
                            <Cards
                                :element="element"
                                @mousedown="
                                    form.element = element.id;
                                    elem = element;
                                "
                                :color="element.prioridad"
                                @click="card = true"
                            />
                        </template>
                    </Dragable>
                </div>
            </template>
        </form>
    </div>
    <CardsModal
        :show="card"
        @close="closeModal"
        :elem="elem"
        :color="elem.prioridad"
    >
        <template #button>
            <Boton
                @click="
                    provs = true;
                    card = false;
                "
                v-if="elem.listas_id === 1"
            >
                <h3>Asignar</h3>
            </Boton>
            <Boton
                @click="
                    form.element = elem.id;
                    form.list = 3;
                    submit();
                    asign.value = true;
                "
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                v-if="elem.listas_id === 2"
            >
                <h3>Finalizado</h3>
            </Boton>
            <Boton
                @click="
                    provs = true;
                    card = false;
                "
                v-if="elem.listas_id === 3"
            >
                <h3>Algo</h3>
            </Boton>
        </template>
    </CardsModal>
    <ProvsModal :show="provs" @close="closeModal" @valor="AsignProv">
        <template #button>
            <Boton
                @click="
                    asign = true;
                    provs = false;
                "
            >
                <h3>Asignar</h3>
            </Boton>
        </template>
    </ProvsModal>
    <AsigModal :show="asign" :elem="prov">
        <template #button>
            <Boton
                @click="
                    form.prov = prov.id;
                    submit();
                "
            >
                <h3>Aceptar</h3>
            </Boton>
        </template>
    </AsigModal>
</template>
