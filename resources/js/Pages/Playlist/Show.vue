<template>

    <MusicLayout>

        <template #title>
            My playlist :  {{ playlist.title }}
        </template>

        <template #action>

            <Link :href="route('playlists.index')" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                Back
            </Link>

        </template>

        <template #content>
            <TrackList :tracks="tracks" />
        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import TrackList from '@/Components/Track/TrackList.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Show',
    components: {
        MusicLayout,
        Link,
        TrackList
    },
    props: {
        playlist: Object,
        tracks: Array,
    }
}
</script>
