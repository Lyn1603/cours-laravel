<template>

    <MusicLayout>
        <template #title>
            {{ track.title }}
        </template>

        <template #action>
            <Link :href="route('tracks.index')"
                  class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                Back
            </Link>
        </template>

        <template #content>
            <form @submit.prevent="edit">
                <div>
                    <label for="title" class="block text-gray-700 text-lg font-bold mb-2"> Title </label>
                    <input
                        class=" bg-[#c3b377] text-[#f6ed95] shadow rounded py-2 px-3  appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"
                        id="title" v-model="form.title" type="text">
                    <p class="text-red-500">{{ form.errors.title }}</p>
                </div>
                <div>
                    <label for="artist" class="block text-gray-700 text-lg font-bold mb-2"> Artist </label>
                    <input
                        class=" bg-[#c3b377] text-[#f6ed95] shadow rounded py-2 px-3  appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"
                        id="artist" name="artist" v-model="form.artist" type="text">
                    <p class="text-red-500">{{ form.errors.artist }}</p>

                </div>
                <div>
                    <label for="display" class="block text-gray-700 text-lg font-bold mb-2"> Display </label>
                    <select
                        class=" w-20 bg-[#c3b377] text-[#f6ed95] shadow rounded py-2 px-3  appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"
                        name="display" id="display" v-model="form.display">
                        <option :value="true"> Oui</option>
                        <option :value="false"> Non</option>

                    </select>
                    <p class="text-red-500">{{ form.errors.display }}</p>

                </div>

                <input type="submit" value="Modify"
                       class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">

            </form>


        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import {Link} from '@inertiajs/vue3';

export default {
    name: 'Edit',
    components: {
        MusicLayout,
        Link
    },
    data() {
        return {
            form: this.$inertia.form(
                {
                    title: this.track.title,
                    artist: this.track.artist,
                    display: this.track.display ? true : false,
                }
            )
        }
    },
    props: {
        track: Object,
    },
    methods: {
        edit() {
            console.log('submit');
            this.form.put(route('tracks.update', {track: this.track}));
        }
    }
}
</script>

<style>
body {
    color: #462f1b;
}
</style>
