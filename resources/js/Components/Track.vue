<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white mt-8">
        <div class="px-6 py-4">
            <img :src=" `storage/${track.image}` " alt="">
            <div class="font-bold text-xl mb-2">
               Track  {{ track.title }}
            </div>
            <Link :href="route('tracks.edit', {track : track})" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Modifier
            </Link>
            <Link :href="route('tracks.destroy', {track : track})" as="button" method="delete" class="bg-red-500 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Supprimer
            </Link>

        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#music</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#track</span>
        </div>
        <div class="px-6 py-4">
            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="handleClick">
                Lire
            </button>
        </div>
    </div>
</template>

<script>
import { Link  } from "@inertiajs/vue3";

export default {

    name: 'Track',
    emits : ['played'],
    components : {
        Link,
    },
    props: {
        track: Object
    },
    methods : {
        handleClick(){
            this.$emit('played', this.track)

        }
    }
}
</script>
