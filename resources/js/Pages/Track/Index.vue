<template>
    <MusicLayout/>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Liste de mes tracks</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <Tracks v-for="track in tracks" :key="track.uuid" :track="track" @played="play" />
        </div>
    </div>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import Tracks from "@/Components/Track.vue";

export default {
    name: 'Index',
    components: {
        MusicLayout,
        Tracks,
    },
    data (){
        return{
            audio : null,
            currentTrack : null,

        }
    },
    props: {
        tracks: Array,
    },
    methods: {
        play(track){
            const url = 'storage/' + track.music;


            if (!this.currentTrack){
                this.audio = new Audio(url)
                this.audio.play()
            }else if (this.currentTrack !== track.uuid){
                this.audio.pause()
                this.audio.src = url
                this.audio.play()
            }else {
                this.audio.paused ? this.audio.play() : this.audio.pause();
            }

            this.currentTrack = track.uuid
            this.audio.addEventListener('ended', () => this.currentTrack = null );
        }
    }
}
</script>


