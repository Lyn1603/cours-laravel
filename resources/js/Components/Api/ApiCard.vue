<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white mt-8">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">
                {{ apiKey.name }}
            </div>
            <div class="font-bold text-xl mb-2">
                {{ apiKey.key }}
            </div>
            <Link v-if="$page.props.auth.user" :href="route('apiKey.destroy', {apiKey : apiKey})" as="button" method="delete" class="bg-red-500 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Supprimer
            </Link>

        </div>
    </div>
</template>

<script>
import { Link  } from "@inertiajs/vue3";

export default {

    name: 'ApiCard',
    components : {
        Link,
    },
    props: {
        apiKey: Object
    },

}
</script>
