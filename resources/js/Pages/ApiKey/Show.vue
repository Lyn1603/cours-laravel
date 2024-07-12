<template>

    <MusicLayout>

        <template #title>
            Title Playlist
        </template>

        <template #action>
            <Link :href="route('apikey.create')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Add a music
            </Link>
            <Link :href="route('apikey.index')" class="bg-lime-300 hover:bg-lime-600 text-white font-bold rounded py-2 px-4">
                Playlist
            </Link>
        </template>

        <template #content>
            <ApiCard :api-key="apikey" />
        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import TrackList from '@/Components/Track/TrackList.vue';
import { Link } from '@inertiajs/vue3';
import ApiCard from "@/Components/Api/ApiCard.vue";

export default {
    name: 'Show',
    components: {
        ApiCard,
        MusicLayout,
        Link,
    },
    props: {
        apikey: Array,
    }
}
</script>
