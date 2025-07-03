<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { CubeTransparentIcon } from '@heroicons/vue/24/outline';

defineProps({
    leagues: Object,
});

const { url } = usePage();
</script>

<template>
   
   
    <nav class="flex flex-1 flex-col over">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
                <ul role="list" class="-mx-2 space-y-1">
                    <li v-for="league in leagues" :key="league.id">
                        <Link 
                           :data-pan="`league-${league.code}`"
                            :href="`/${league.code}`" 
                            :class="[
                                url.includes(league.code) ? 'border-red-600 bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white',
                                'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 border-r-4'
                            ]"
                        >
                            <CubeTransparentIcon class="w-6 h-6" />
                            {{ __(league.name) }}
                        </Link>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>


<div class="flex justify-center items-center my-6">

<!-- START ADVERTISER: teppich.de from awin.com -->

<a rel="sponsored" href="https://www.awin1.com/cread.php?s=3393109&v=53143&q=465301&r=1762335">
    <img src="https://www.awin1.com/cshow.php?s=3393109&v=53143&q=465301&r=1762335" border="0">
</a>
</div>
<!-- END ADVERTISER: teppich.de from awin.com -->

</template>
