<template>
    <div>
        <nav class="bg-[#c3b377] shadow rounded-lg">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div>
                        <div class=" hidden sm:ml-6 sm:block">
                            <div class=" text-center flex space-x-4">
                                <!-- New links for music and playlists -->
                                <Link v-if="$page.props.auth.user" :href="route('tracks.index')"
                                      class="text-[#f6ed95] font-bold rounded py-2 px-4 bg-c3b377 hover:text-gray-800 hover:bg-f6ed95"
                                      :class="[route().current().includes('tracks') ? 'bg-c3b377 hover:text-white' : 'bg-transparent hover:text-white']">
                                    My musics
                                </Link>
                                <Link v-if="$page.props.auth.user" :href="route('playlists.index')"
                                      class="text-[#f6ed95] font-bold rounded py-2 px-4 bg-c39977 hover:text-gray-800 hover:bg-f6ed95"
                                      :class="[route().current().includes('playlists') ? 'bg-c39977 hover:text-white' : 'bg-transparent hover:text-white']">
                                    My playlists
                                </Link>
                                <Link v-if="$page.props.auth.user" :href="route('apikey.index')"
                                      class="text-[#f6ed95] font-bold rounded py-2 px-4 bg-bb8f67 hover:text-gray-800 hover:bg-f6ed95"
                                      :class="[route().current().includes('apikey') ? 'bg-bb8f67 hover:text-white' : 'bg-transparent hover:text-white']">
                                    My api keys
                                </Link>
                                <Link v-if="!$page.props.auth.user" :href="route('login')"
                                      class="text-[#f6ed95] font-bold rounded py-2 px-4 bg-c39977 hover:text-gray-800 hover:bg-f6ed95"
                                      :class="[route().current().includes('login') ? 'bg-c39977 hover:text-white' : 'bg-transparent hover:text-white']">
                                    Log in
                                </Link>
                                <Link v-if="!$page.props.auth.user" :href="route('register')"
                                      class="text-[#f6ed95] font-bold rounded py-2 px-4 bg-c3b377 hover:text-gray-800 hover:bg-f6ed95"
                                      :class="[route().current().includes('register') ? 'bg-c3b377 hover:text-white' : 'bg-transparent hover:text-white']">
                                    Register
                                </Link>
                                <Link v-if="$page.props.auth.user" as="button" method="POST" :href="route('logout')"
                                      class="text-[#f6ed95] font-bold rounded py-2 px-4 bg-c39977 hover:text-gray-800 hover:bg-f6ed95"
                                      :class="[route().current().includes('logout') ? 'bg-c39977 hover:text-white' : 'bg-transparent hover:text-white']">
                                    Logout
                                </Link>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <div class="px-16">
            <div class="flex justify-between items-center">
                <h4 class="text-3xl font-bold my-6">
                    <slot name="title"/>
                </h4>
                <div>
                    <slot name="action"/>
                </div>
            </div>

            <div>
                <slot name="content"/>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: 'MusicLayout',
    components: {
        Link
    }
}
</script>
