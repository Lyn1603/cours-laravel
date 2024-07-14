<template>
    <MusicLayout>
        <template #title>
            Create an api key
        </template>
        <template #action>
            <Link :href="route('apikey.index')" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                Back
            </Link>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <!-- Titre -->
                <div class="mb-3">
                    <label for="name" class="block text-gray-700 text-lg font-bold mb-2">Name</label>
                    <input id="name" v-model="form.name" type="text"
                           class="bg-[#c3b377] text-[#f6ed95] shadow rounded-lg py-2 px-4 placeholder-[#f6ed95] focus:outline-none focus:ring-2 focus:ring-c39977 focus:border-transparent sm:w-96"
                           :class="{ 'border-red-500': form.errors.name }" placeholder="name">
                    <p class="text-red-500 text-xs italic">{{ form.errors.name }}</p>
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
                name: '',
                key: '',
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('apikey.store'), {
                //preserveState: false,
            });
        }
    }
}
</script>

<style>
body {
    background-color: #ede7e0;

}
</style>
