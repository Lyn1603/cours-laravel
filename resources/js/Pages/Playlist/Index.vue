<template>

    <MusicLayout>

        <template #title>
            <h1 class="text-2xl font-bold mb-4">List of playlists</h1>
        </template>

        <template #action>
            <div class="flex space-x-4 mb-4">
                <Link :href="route('playlists.create')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                    Create a playlist
                </Link>
                <Link :href="route('tracks.index')" class="bg-lime-300 hover:bg-lime-600 text-white font-bold rounded py-2 px-4">
                    Musics
                </Link>
            </div>
        </template>

        <template #content>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Musics number</th>
                        <th class="py-2 px-4 border-b">Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(playlist, i) in playlists" :key="playlist.uuid" class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ i + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ playlist.title }}</td>
                        <td class="py-2 px-4 border-b">{{ playlist.tracks_count }} musics</td>
                        <td class="py-2 px-4 border-b">{{ playlist.created_at }}</td>
                        <td class="py-2 px-4 border-b">
                            <Link :href="route('playlists.show', { playlist : playlist })"> Link </Link>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    components: {
        MusicLayout,
        Link
    },
    props: {
        playlists: Array,
    },
}
</script>
