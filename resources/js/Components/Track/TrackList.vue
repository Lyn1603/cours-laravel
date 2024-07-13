<template>

            <div>

                <div class="grid grid-cols-4 gap-4">
                    <Tracks v-for="track in filterTrack" :key="track.id" :track="track" @played="play(track)"/>
                </div>
            </div>

</template>

<script>
import { Link  } from "@inertiajs/vue3";
import MusicLayout from "@/Layouts/MusicLayout.vue";
import Tracks from "@/Components/Track/Track.vue";

export default {
    name: 'TrackList',
    components: {
        MusicLayout,
        Tracks,
        Link,
    },
    data (){
        return{
            audio : null,
            currentTrack : null,
            filter: ''

        }
    },
    props: {
        tracks: Array,
    },
    computed: {
        filterTrack() {
            return this.tracks.filter(track => track.title.toLowerCase().includes(this.filter.toLowerCase())
                || track.artist.toLowerCase().includes(this.filter.toLowerCase())
            );
        }
    },
    methods: {

        play(track) {
            const url = 'storage/' + track.music;


            /* switch (true) {
                 case !this.currentTrack:
                     this.audio = new Audio(url);
                     this.audio.play();
                     break;

                 case this.currentTrack !== track.uuid:
                     this.audio.pause();
                     this.audio.src = url;
                     this.audio.play();
                     break;

                 default:
                     this.audio.paused ? this.audio.play() : this.audio.pause();
                     break;
             }

 */
            if (!this.currentTrack) {
                this.audio = new Audio(url)
                this.audio.play()
            } else if (this.currentTrack !== track.uuid) {
                this.audio.pause()
                this.audio.src = url
                this.audio.play()
            } else {
                this.audio.paused ? this.audio.play() : this.audio.pause();
            }

            this.currentTrack = track.uuid
            this.audio.addEventListener('ended', () => this.currentTrack = null);
        },

    }
}
</script>


