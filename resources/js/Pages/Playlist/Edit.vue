<template>

    <MusicLayout>
        <template #title>
            Liste de mes playlists
        </template>

        <template #action>
            <Link :href="route('playlists.index')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Retour
            </Link>
        </template>

        <template #content>
            Formulaire de création
            <form @submit.prevent="edit">
                <div>
                    <label for="title" > Titre </label>
                    <br>
                    <input id="title" v-model="form.title" type="text">
                    <p class="text-red-500">{{ form.errors.title }}</p>
                </div>
                <div>
                    <label for="artist" > Artiste </label>
                    <br>
                    <input id="artist" name="artist" v-model="form.artist" type="text">
                    <p class="text-red-500">{{ form.errors.artist }}</p>

                </div>
                <div>
                    <label for="artist" > Display </label>
                    <br>
                    <select name="display" id="display" v-model="form.display">
                        <option :value="true" > Oui </option>
                        <option :value="false"> Non </option>

                    </select>
                    <p class="text-red-500">{{ form.errors.display }}</p>

                </div>
                <div>
                    <label for="image" > Image </label>
                    <br>
                    <input id="image" name="image" @input="form.image = $event.target.files[0]" type="file">

                    <p class="text-red-500">{{ form.errors.image }}</p>

                </div>
                <div>
                    <label for="audio" > Audio </label>
                    <br>
                    <input id="audio" name="audio" @input="form.music = $event.target.files[0]" type="file" >

                    <p class="text-red-500">{{ form.errors.music }}</p>

                </div>

                <input type="submit" value="Modifier la musique"  class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">

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
    data(){
        return {
            form: this.$inertia.form(
                {
                    title: this.track.title,
                    artist: this.track.artist,
                    image: this.track.image,
                    music: this.track.music,
                    display: this.track.display ? true : false,
                }

            )
        }
    },
    props : {
        track : Object,
    },
    methods : {
        edit(){
            console.log('submit');
            this.form.put(route('playlists.update') , { track: this.track });
        }
    }
}
</script>
