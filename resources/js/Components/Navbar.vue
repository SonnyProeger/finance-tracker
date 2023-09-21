<template>
    <!-- Navbar -->
    <nav
        class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
    >
        <div
            class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
        >
            <!-- Brand -->
            <a
                class="text-indigo-600 text-sm uppercase hidden lg:inline-block font-semibold"
            >{{ parseRouteName(this.currentUrl) }}</a
            >
            <!--     -->
            <!-- User -->
            <ul
                class="flex-col md:flex-row list-none items-center hidden md:flex"
            >
                <UserDropdown></UserDropdown>
            </ul>
        </div>
    </nav>

    <!-- End Navbar -->
</template>
<script>

import UserDropdown from "@/Components/UserDropdown.vue";

export default {
    methods: {
        parseRouteName(url) {
            // Use a regular expression to match everything after the last '/'
            const regex = /\/([^/]+)\/?$/;
            const match = url.match(regex);

            // Extract the matched part or return a default value
            return match ? match[1] : 'DefaultRouteName';
        },
    },
    components: {
        UserDropdown
    },
    computed: {
        currentUrl() {
            // Get the current URL
            return this.$page.url;
        },
    }
};
</script>
