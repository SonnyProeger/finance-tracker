<script setup>
import {Link} from '@inertiajs/vue3';

import {ref} from "vue";
import NotificationDropdown from "@/Components/NotificationDropdown.vue";
import UserDropdown from "@/Components/UserDropdown.vue";

const collapseShow = ref("hidden");

const toggleCollapseShow = (classes) => {
    collapseShow.value = classes;
};
</script>

<template>
    <nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
    >
        <div
            class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
            <!-- Toggler -->
            <button
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                type="button"
                v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
            >
                <i class="fas fa-bars"></i>
            </button>
            <!-- Brand -->
            <a
                class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            >
                Finance Tracker
            </a>
            <!-- User -->
            <ul class="md:hidden items-center flex flex-wrap list-none">
                <li class="inline-block relative">
                    <NotificationDropdown></NotificationDropdown>
                </li>
                <li class="inline-block relative">
                    <UserDropdown></UserDropdown>
                </li>
            </ul>
            <!-- Collapse -->
            <div
                class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
                v-bind:class="collapseShow"
            >
                <!-- Collapse header -->
                <div
                    class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
                >
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <a
                                class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                                href="javascript:void(0)"
                            >
                                Finance Tracker
                            </a>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button
                                type="button"
                                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                v-on:click="toggleCollapseShow('hidden')"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <form class="mt-6 mb-4 md:hidden">
                    <div class="mb-3 pt-0">
                        <input
                            type="text"
                            placeholder="Search"
                            class="border-0 px-3 py-2 h-12 border border-solid  border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
                        />
                    </div>
                </form>
                <!-- Navigation -->
                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <Link
                            :href="'/dashboard'"
                            class="text-blueGray-700 hover:text-indigo-600 text-xs uppercase py-3 font-bold block"
                            :class="{ 'text-indigo-600': this.$page.url === '/dashboard' }"
                        >
                            <i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                            Dashboard
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="'/transactions'"
                            class="text-blueGray-700 hover:text-indigo-600 text-xs uppercase py-3 font-bold block"
                            :class="{ 'text-indigo-600': this.$page.url === '/transactions' }"
                        >
                            <i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                            Transactions
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="'/upload'"
                            class="text-blueGray-700 hover:text-indigo-600 text-xs uppercase py-3 font-bold block"
                            :class="{ 'text-indigo-600': this.$page.url === '/upload' }"
                        >
                            <i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                            Upload
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="'/profile'"
                            class="text-blueGray-700 hover:text-indigo-600 text-xs uppercase py-3 font-bold block"
                            :class="{ 'text-indigo-600': this.$page.url === '/profile' }"
                        >
                            <i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                            Profile Page
                        </Link>
                    </li>
                    <!--                    <li class="items-center">-->
                    <!--                        <a-->
                    <!--                            class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"-->
                    <!--                            href="/logout"-->
                    <!--                        ><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>-->
                    <!--                            Logout</a-->
                    <!--                        >-->
                    <!--                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
</template>
