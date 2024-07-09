<script>
export default {
    name: 'Track',
    emits : ['played'],
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

<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white mt-8">
        <div class="px-6 py-4">
            <img :src=" `storage/${track.image}` " alt="">
            <div class="font-bold text-xl mb-2">
               Track  {{ track.title }}
            </div>
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

