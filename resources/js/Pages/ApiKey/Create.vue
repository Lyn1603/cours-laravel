<template>
    <MusicLayout>
        <template #title>
            Créer une musique
        </template>
        <template #action>
            <Link :href="route('apikey.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
                Retour
            </Link>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <!-- Titre -->
                <div class="mb-3">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom de la clé</label>
                    <input id="name" v-model="form.name" type="text"
                           class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"
                           :class="{ 'border-red-500': form.errors.name }" placeholder="nom">
                    <p class="text-red-500 text-xs italic">{{ form.errors.name }}</p>
                </div>


                <input type="submit" value="Créer la clé" class=" text-white font-bold rounded py-2 px-4"
                       :class="[form.processing ? 'bg-gray-500' : 'bg-blue-500 hover:bg-blue-700']" :disabled="form.processing">
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link  } from "@inertiajs/vue3";
export default {
    name: 'Create',
    components: {
        MusicLayout,
        Link,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                key: '',
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('apikey.store'), {
                //preserveState: false,
            });
        }
    }
}
</script>
