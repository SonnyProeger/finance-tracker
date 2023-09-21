<template>
    <div>
        <sidebar-component></sidebar-component>
        <div class="relative md:ml-64 bg-blueGray-100">
            <navbar-component></navbar-component>

            <!-- Page Content -->
            <main>
                <slot/>
            </main>

            <footer class="block py-4">
                <div class="container mx-auto px-4">
                    <hr class="mb-4 border-b-1 border-blueGray-200"/>
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-4/12 px-4">
                            <div class="text-sm text-blueGray-500 font-semibold py-1">
                                Copyright © {{ date }}
                                <a
                                    href="https://www.github.com/sonnyproeger"
                                    class="text-blueGray-500 hover:text-blueGray-700 text-sm font-semibold py-1"
                                >
                                    Sonny Proeger
                                </a>
                            </div>
                        </div>
                        <div class="w-full md:w-8/12 px-4">
                            <ul class="flex flex-wrap list-none md:justify-end  justify-center">
                                <li>
                                    <a
                                        href="https://www.github.com/sonnyproeger"
                                        class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3"
                                    >
                                        Sonny Proeger
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://github.com/SonnyProeger/finance-tracker/blob/master/LICENSE"
                                        class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3"
                                    >
                                        MIT License
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
import NavbarComponent from "@/Components/Navbar.vue";
import SidebarComponent from "@/Components/Sidebar.vue";

export default {
    name: "DashboardLayout",
    components: {SidebarComponent, NavbarComponent},
    data() {
        return {
            date: new Date().getFullYear(),
        }
    },
}
</script>

<style scoped>

</style>
