<template>

    <MusicLayout>

        <template #title>
            Liste de mes clés
        </template>

        <template #action>
            <Link v-if="$page.props.auth.user" :href="route('apikey.create')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Ajouter une clé
            </Link>
        </template>

        <template #content>
            <div>
                <input v-model='filter' type="search" class="shadow border rounded py-2 px-3 text-gray-600">

                <div class="grid grid-cols-4 gap-4">
                    <ApiCard :key="apiKey.id" :apiKey="apiKey" />
                </div>
            </div>
        </template>

    </MusicLayout>

</template>

<script>
import { Link  } from "@inertiajs/vue3";
import MusicLayout from "@/Layouts/MusicLayout.vue";
import ApiCard from "@/Components/Api/ApiCard.vue";

export default {
    name: 'Index',
    components: {
        MusicLayout,
        ApiCard,
        Link,
    },
    data (){
        return{
            filter: ''

        }
    },
    props: {
        apiKey: Array,
    },
    computed: {
        filterApi(){
            return this.apiKey.filter(keys => keys.name.toLowerCase().includes(this.filter.toLowerCase()))
        }
    },

}
</script>


