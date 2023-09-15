<script setup>
import {Link} from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>

    <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
              class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard
        </Link>

        <template v-else>
            <Link :href="route('login')"
                  class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Log in
            </Link>

            <Link v-if="canRegister" :href="route('register')"
                  class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Register
            </Link>
        </template>
    </div>
    <div class="bg-blue-900 text-white">
        <div class="container mx-auto py-16 px-4 text-center">
            <h1 class="text-4xl font-extrabold">Welcome to Your Finance Tracker</h1>
            <p class="mt-4 text-xl">Effortlessly manage your finances and achieve your financial goals.</p>
            <div class="mt-8">
                <Link :href="route('register')"
                      class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-semibold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Get Started
                </Link>
            </div>
        </div>
    </div>
    <!-- Features Section -->
    <div class="container mx-auto py-12 px-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Key Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Feature 1 -->
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2">Track Income and Expenses</h3>
                <p class="text-gray-600">Effortlessly monitor your financial transactions, both income and expenses, in
                    one place.</p>
            </div>

            <!-- Feature 2 -->
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2">Visualize Financial Data</h3>
                <p class="text-gray-600">Visualize your financial data through interactive charts and graphs for better
                    insights.</p>
            </div>

            <!-- Feature 3 -->
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2">Set and Monitor Budgets</h3>
                <p class="text-gray-600">Create budgets and easily track your spending to stay on top of your financial
                    goals.</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Add your custom styles here */
</style>


<style scoped>

</style>
