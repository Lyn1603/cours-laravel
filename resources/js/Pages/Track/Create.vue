<template>
    <MusicLayout>
        <template #title>
            Create a music
        </template>
        <template #action>
            <Link :href="route('tracks.index')" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                Back
            </Link>
        </template>
        <template  #content>
            <form @submit.prevent="submit" class="py-8 px-4 rounded">
                <!-- Titre -->
                <div class="mb-3">
                    <label for="title" class="block text-gray-700 text-lg font-bold mb-2">Title</label>
                    <input id="title" v-model="form.title" type="text"
                           class=" bg-[#c3b377] shadow rounded py-2 px-3  appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2 text-[#f6ed95]"
                           :class="{ 'border-red-500': form.errors.title }" placeholder="Titre">
                    <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
                </div>

                <!-- Artist -->
                <div class="mb-3">
                    <label for="artist" class="block text-gray-700 text-lg font-bold mb-2">Artist</label>
                    <input id="artist" v-model="form.artist" type="text"
                           class=" bg-[#c3b377] text-[#f6ed95] shadow rounded py-2 px-3  appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"
                           :class="{ 'border-red-500': form.errors.artist }" placeholder="Artist">
                    <p class="text-red-500 text-xs italic">{{ form.errors.artist }}</p>
                </div>

                <!-- Display -->
                <div class="mb-3">
                    <label for="artist" class="block text-gray-700 text-lg font-bold mb-2">Display</label>
                    <select name="display" id="display" v-model="form.display"
                            class="  w-20 bg-[#c3b377] text-[#f6ed95] shadow rounded py-2 px-3  appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"                           :class="{ 'border-red-500': form.errors.artist }" placeholder="Artiste">
                            :class="{ 'border-red-500': form.errors.display }">
                        <option :value="true">Oui</option>
                        <option :value="false">Non</option>
                    </select>
                    <p class="text-red-500 text-xs italic">{{ form.errors.display }}</p>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label for="image" class="block text-gray-700 text-lg font-bold mb-2">Image</label>
                    <input @input="form.image = $event.target.files[0]" type="file" name="image" id="image" >
                    <p class="text-red-500 text-xs italic">{{ form.errors.image }}</p>
                </div>

                <!-- Audio -->
                <div class="mb-3">
                    <label for="audio" class="block text-gray-700 text-lg font-bold mb-2">Audio</label>
                    <input @input="form.music = $event.target.files[0]" type="file" name="audio" id="audio">

                    <p class="text-red-500 text-xs italic">{{ form.errors.audio }}</p>
                </div>

                <input type="submit" value="Create" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4"
                       :class="[form.processing ? 'bg-[#c3b377]' : 'bg-[#bb8f67] ']" :disabled="form.processing">
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link  } from "@inertiajs/vue3";
export default {
    name: 'Create',
    components: {
        MusicLayout,
        Link,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                artist: '',
                display: true,
                image: null,
                music: null,
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('tracks.store'), {
                //preserveState: false,
            });
        }
    }
}
</script>

<style>

body {
    background-color: #ddc477;

    #artist {
        background-color: #c3b377;
        color: #f6ed95;
    }
}
</style>
