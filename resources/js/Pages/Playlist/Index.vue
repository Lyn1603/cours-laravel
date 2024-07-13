<template>
    <MusicLayout>
        <template #title>
            <h1 class="text-3xl font-bold text-gray-800"> My playlists</h1>
        </template>

        <template #action>
            <div class="flex space-x-4 mb-4">
                <Link  :href="route('playlists.create')" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                    Create a playlist
                </Link>
                <Link :href="route('tracks.index')" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                    Musics
                </Link>
            </div>
        </template>

        <template #content>
            <div class="overflow-x-auto">
                <table class="min-w-full ">
                    <thead>
                    <tr class="bg-[#c3b377] text-[#f6ed95]">
                        <th class="py-2 px-4 ">#</th>
                        <th class="py-2 px-4 ">Title</th>
                        <th class="py-2 px-4 ">Musics number</th>
                        <th class="py-2 px-4 ">Created at</th>
                        <th class="py-2 px-4 ">Actions </th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(playlist, i) in playlists" :key="playlist.uuid" class="even:bg-gray-100">
                        <td class="py-2 px-4 text-center">{{ i + 1 }}</td>
                        <td class="py-2 px-4 text-center">{{ playlist.title }}</td>
                        <td class="py-2 px-4 text-center">{{ playlist.tracks_count }} musics</td>
                        <td class="py-2 px-4 text-center">{{ playlist.created_at }}</td>
                        <td class=" flex flex-row py-2 px-4  justify-center gap-4 ">
                            <Link :href="route('playlists.show', { playlist : playlist })" class="text-[#BB8F67] font-bold hover:underline">Show</Link>

                            <Link as="button" method="DELETE" :href="route('playlists.destroy', { playlist : playlist })" class="text-red-500 font-bold hover:underline">Delete</Link>
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

<style>

body{
    background-color: #ddc477;
}

td {
    background-color: #ddc477;
}
</style>
