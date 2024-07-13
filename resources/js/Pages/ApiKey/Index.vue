<template>
    <MusicLayout>
        <template #title>
            <h1 class="text-3xl font-bold text-gray-800"> My api keys </h1>
        </template>

        <template #action>
            <div class="flex space-x-4 mb-4">
                <Link :href="route('apikey.create')" class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                    Create a key
                </Link>
                <Link :href="route('tracks.index')"  class="bg-[#c3b377] text-[#f6ed95] font-bold rounded py-2 px-4">
                    Back
                </Link>
            </div>
        </template>

        <template #content>
            <div class="overflow-x-auto">
                <table class="min-w-full ">
                    <thead>
                    <tr class="bg-[#c3b377] text-[#f6ed95]">
                        <th class="py-2 px-4 text-center">ID</th>
                        <th class="py-2 px-4 text-center">Name of the key</th>
                        <th class="py-2 px-4 text-center">Key</th>
                        <th class="py-2 px-4 text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(api, i) in apikeys" :key="api.uuid" >
                        <td class="py-2 px-4 text-center ">{{ i + 1 }}</td>
                        <td class="py-2 px-4 text-center ">{{ api.name }}</td>
                        <td class="py-2 px-4 text-center ">{{ api.key }}</td>
                        <td class="py-2 px-4 text-center">
                            <button @click="deleteApiKey(api.uuid)" class="text-red-500 font-bold py-1 px-2 rounded ml-2 hover:underline">
                                Delete
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    components: {
        MusicLayout,
        Link
    },
    props: {
        apikeys: Object
    },
    methods : {
        deleteApiKey(api){
            console.log('api' , api);
            this.$inertia.delete(route('apikey.destroy' , { apikey : api } ))
        }
    }
};
</script>
