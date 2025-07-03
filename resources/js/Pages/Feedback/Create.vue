<template>
    <div class="max-w-lg mx-auto p-4">
        <AiNav />
        <h1 class="text-2xl font-bold text-white">{{ __('feedback.We Value Your Feedback') }}</h1>
        
        <form @submit.prevent="submitFeedback">
            <div class="mb-10">
                <label for="rating" class="block text-sm font-medium text-white">{{ __('feedback.Rate Us:') }}</label>
                <select v-model="form.rating" id="rating" class="mt-1 block w-full">
                    <option v-for="n in 5" :key="n" :value="n">{{ '⚽'.repeat(n) }}</option>
                </select>
                <span v-if="errors.rating" class="text-red-500">{{ errors.rating }}</span>
            </div>

            <div class="mb-4">
                <label for="feature" class="block text-sm font-medium text-white">{{ __('feedback.What feature would you like to see?') }}</label>
                <textarea v-model="form.feature" id="feature" class="mt-1 block w-full border" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label for="improvement" class="block text-sm font-medium text-white">{{ __('feedback.How can we improve?') }}</label>
                <textarea v-model="form.improvement" id="improvement" class="mt-1 block w-full border" rows="4"></textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ __('feedback.Submit Feedback') }}</button>
        </form>

        <div v-if="success" class="mt-4 text-green-500">{{ success }}</div>

        <div class="mt-4 flex space-x-4">
            <Link href="/" class="bg-gray-500 text-white px-4 py-2 rounded block text-center">{{ __('feedback.Back to Main Page') }}</Link>
            <Link href="/" class="bg-green-500 text-white px-4 py-2 rounded  text-center hidden"></Link>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
import __ from '@/lang';
import AiNav from '@/Components/AiNav.vue'

const form = ref({
    rating: 1, // Set default rating to 1
    feature: '',
    improvement: ''
});
const success = ref(null);
const errors = ref({});

const submitFeedback = () => {
    router.post('/feedback', form.value, {
        onSuccess: () => {
            success.value = 'Thank you for your feedback!';
            form.value = { rating: 1, feature: '', improvement: '' }; // Reset form with default rating
        },
        onError: (error) => {
            errors.value = error; // Capture validation errors
        }
    });
};
</script>