<template>
    <MusicLayout>
        <template #title>
            <h1 class="text-2xl font-bold mb-4"> My keys </h1>
        </template>

        <template #action>
            <div class="flex space-x-4 mb-4">
                <Link :href="route('apikey.create')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                    Create a key
                </Link>
                <Link :href="route('tracks.index')" class="bg-lime-300 hover:bg-lime-600 text-white font-bold rounded py-2 px-4">
                    Back
                </Link>
            </div>
        </template>

        <template #content>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name of the key</th>
                        <th class="py-2 px-4 border-b">Key</th>
                        <th class="py-2 px-4 border-b">Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(api, i) in apikeys" :key="api.uuid" class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ i + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ api.name }}</td>
                        <td class="py-2 px-4 border-b">{{ api.key }}</td>
                        <td class="py-2 px-4 border-b">
                            <button @click="deleteApiKey(api.uuid)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded ml-2">
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
