<template>
    <div class="bg-[#ede7e0] py-8 px-4"> <!-- Utilisation de bg-yellow-100 pour un jaune plus pâle -->
        <MusicLayout>

            <template #title>
                <h1 class=" text-[#462f1b] text-3xl font-bold "> My tracks</h1>
            </template>

            <template #action>
                <Link v-if="$page.props.isAdmin" :href="route('tracks.create')" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                    Add a music
                </Link>
            </template>

            <template #content>
                <div>
                    <div class="flex flex-row justify-center align-center gap-20">
                        <h3> Search a song </h3>
                        <input v-model='filter' placeholder="Title" type="search" class="bg-[#c3b377] text-[#f6ed95] shadow rounded-lg py-2 px-4 placeholder-[#f6ed95] focus:outline-none focus:ring-2 focus:ring-c39977 focus:border-transparent sm:w-96">
                        <button type="submit">
                            <svg class="h-10 w-10 bg-[#c3b377] text-[#f6ed95] rounded-lg " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l5-5m0 0l-5-5m5 5H4"></path>
                            </svg>
                        </button>
                    </div>


                    <div class="grid grid-cols-4 gap-4 mt-4">
                        <Tracks v-for="track in filterTrack" :key="track.id" :track="track" @played="play(track)"/>
                    </div>
                </div>
            </template>

        </MusicLayout>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import MusicLayout from "@/Layouts/MusicLayout.vue";
import Tracks from "@/Components/Track/Track.vue";

export default {
    name: 'Index',
    components: {
        MusicLayout,
        Tracks,
        Link,
    },
    data() {
        return {
            audio: null,
            currentTrack: null,
            filter: ''
        }
    },
    props: {
        tracks: Array,
    },
    computed: {
        filterTrack() {
            return this.tracks.filter(track =>
                track.title.toLowerCase().includes(this.filter.toLowerCase()) ||
                track.artist.toLowerCase().includes(this.filter.toLowerCase())
            );
        }
    },
    methods: {
        play(track) {
            const url = 'storage/' + track.music;

            if (!this.currentTrack) {
                this.audio = new Audio(url);
                this.audio.play();
            } else if (this.currentTrack !== track.uuid) {
                this.audio.pause();
                this.audio.src = url;
                this.audio.play();
            } else {
                this.audio.paused ? this.audio.play() : this.audio.pause();
            }

            this.currentTrack = track.uuid;
            this.audio.addEventListener('ended', () => this.currentTrack = null);
        },
    }
}
</script>

<style>
body {
    color: #462f1b;
}
</style>
