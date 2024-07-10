<template>

    <MusicLayout>

        <template #title>
            Liste de mes tracks
        </template>

        <template #action>
            <Link :href="route('tracks.create')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Ajouter une musique
            </Link>
        </template>

        <template #content>
            <div>
                    <TrackList  :track="track" />
            </div>
        </template>

    </MusicLayout>

</template>

<script>
import { Link  } from "@inertiajs/vue3";
import MusicLayout from "@/Layouts/MusicLayout.vue";
import Tracks from "@/Components/Track.vue";
import TrackList from "@/Components/TrackList.vue";

export default {
    name: 'Show',
    components: {
        MusicLayout,
        TrackList,
        Link,
    },

}
</script>


