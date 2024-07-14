<template>
    <MusicLayout>
        <template #title>
            Create a playlist
        </template>

        <template #action>
            <Link :href="route('playlists.index')" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                Return
            </Link>
        </template>

        <template #content>
            <form @submit.prevent="submit">
                <!-- Playlist title -->
                <div class="mb-3">
                    <label for="title" class="block text-gray-700 text-lg font-bold mb-3">Title</label>
                    <input v-model="form.title" type="text" id="title" placeholder="Title" class="bg-[#c3b377] text-[#f6ed95] shadow rounded-lg py-2 px-4 placeholder-[#f6ed95] focus:outline-none focus:ring-2 focus:ring-c39977 focus:border-transparent sm:w-96">
                    <p class="text-red-400 text-xs italic">{{ form.errors.title }}</p>
                </div>

                <!-- Tracks -->
                <div v-for="track in tracks" :key="track.uuid" class="flex items-center mb-2">
                    <input :id="track.uuid" :value="track.uuid" v-model="form.tracks" type="checkbox" name="tracks" class="form-checkbox mr-2">
                    <label :for="track.uuid" class="text-gray-700">{{ track.title }}</label>
                </div>
                <br>
                <input type="submit" value="Create" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4"
                       :class="[form.processing ? 'bg-[#c3b377]' : 'bg-[#c3b377]']" :disabled="form.processing">
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Create',
    components: {
        MusicLayout,
        Link
    },
    props: {
        playlists: Array,
        tracks: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                tracks: [],
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('playlists.store'))
        }
    }
}
</script>

<style>
body {
    background-color: #ede7e0;
    color: #462f1b;

}

.form-checkbox {
    accent-color: #f6ed95; /* Change this to your desired color */
    width: 1.25rem;
    height: 1.25rem;
}

label {
    font-size: 1rem;
    font-weight: bold;
}

input[type="submit"]:disabled {
    cursor: not-allowed;
    opacity: 0.5;
}
</style>
