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

                <div class="grid grid-cols-4 gap-4">
                    <ApiCard v-for="api in apiKey" :key="api.id" :apiKey="api" />
                </div>
            </div>
        </template>

    </MusicLayout>

</template>

<script>
import { Link  } from "@inertiajs/vue3";
import MusicLayout from "@/Layouts/MusicLayout.vue";
import ApiCard from "@/Components/Api/ApiCard.vue";
import Tracks from "@/Components/Track/Track.vue";

export default {
    name: 'ApiCardList',
    components: {
        Tracks,
        MusicLayout,
        ApiCard,
        Link,
    },
    props: {
        apiKey: Array,
    },


}
</script>


