<template>
    <div class=" flex flex-wrap justify-center mt-8">
        <div class=" bg-[#c39977] flex flex-row rounded overflow-hidden shadow-lg m-4">
            <div class="px-6 py-4">
                <img :src="`/storage/${track.image}`" alt="" class="w-full">
                <div class=" mb-2">
                    <p class="font-bold text-ml">{{ track.title }}</p>
                    <p class="text-[10px]">{{ track.artist }}</p>
                </div>
            </div>
            <div class="px-6 py-4 flex justify-center">
                <div class="grid grid-cols-1 grid-rows-1 gap-2">

                    <button class="bg-[#c3b377] h-12 w-12 rounded mr-2"
                            @click="handleClick">
                        <svg  width="50px" height="45px" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.6582 9.28638C18.098 10.1862 18.8178 10.6361 19.0647 11.2122C19.2803 11.7152 19.2803 12.2847 19.0647 12.7878C18.8178 13.3638 18.098 13.8137 16.6582 14.7136L9.896 18.94C8.29805 19.9387 7.49907 20.4381 6.83973 20.385C6.26501 20.3388 5.73818 20.0469 5.3944 19.584C5 19.053 5 18.1108 5 16.2264V7.77357C5 5.88919 5 4.94701 5.3944 4.41598C5.73818 3.9531 6.26501 3.66111 6.83973 3.6149C7.49907 3.5619 8.29805 4.06126 9.896 5.05998L16.6582 9.28638Z"
                                stroke="#000000" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                    </button>



                    <Link v-if="$page.props.isAdmin" :href="route('tracks.edit', {track: track})"
                          class="bg-[#c3b377] text-[#f6ed95] h-12 w-12 font-bold rounded py-2 px-4">
                        <svg style="position: relative; right: 45%; bottom: 20%" width="35px" height="45px" fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             viewBox="0 0 512.002 512.002" xml:space="preserve">
<g>
	<g>
		<g>
			<path d="M144.481,326.856l-20.336,61.003l61.004-20.335L487.946,64.729l-40.669-40.669L144.481,326.856z M176.691,353.837
				l-27.782,9.261l9.261-27.782l30.15-30.15l18.521,18.521L176.691,353.837z M217.915,312.613l-18.521-18.521L447.277,46.208
				l18.521,18.521L217.915,312.613z"/>

            <rect x="476.435" y="-3.657" transform="matrix(0.7071 -0.7071 0.7071 0.7071 122.2284 350.5494)"
                  width="15.66" height="62.777"/>
            <polygon points="450.428,496.341 15.665,496.341 15.665,69.62 361.739,69.62 361.739,53.96 0.005,53.96 0.005,512.002
				466.089,512.002 466.089,142.226 450.428,142.226 			"/>
		</g>
	</g>
</g>
</svg>
                    </Link>


                    <Link v-if="$page.props.isAdmin" :href="route('tracks.destroy', {track: track})" as="button"
                          method="delete" class="bg-red-300 rounded py-2 px-4 h-12 w-12">
                        <svg style="position: relative; right: 55%; bottom: 20%;" width="35px" height="45px" viewBox="0 -0.5 21 21" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-179.000000, -360.000000)"
                                   fill="#000000">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path
                                            d="M130.35,216 L132.45,216 L132.45,208 L130.35,208 L130.35,216 Z M134.55,216 L136.65,216 L136.65,208 L134.55,208 L134.55,216 Z M128.25,218 L138.75,218 L138.75,206 L128.25,206 L128.25,218 Z M130.35,204 L136.65,204 L136.65,202 L130.35,202 L130.35,204 Z M138.75,204 L138.75,200 L128.25,200 L128.25,204 L123,204 L123,206 L126.15,206 L126.15,220 L140.85,220 L140.85,206 L144,206 L144,204 L138.75,204 Z"
                                            id="delete-[#1487]">

                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </Link>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";


export default {
    name: 'Track',
    emits: ['played'],
    components: {
        Link,
    },
    props: {
        track: Object
    },
    methods: {
        handleClick() {
            this.$emit('played', this.track)
        }
    }
}
</script>
