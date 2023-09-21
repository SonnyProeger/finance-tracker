<template>
    <DashboardLayout>
        <div class="pt-10">
            <!-- Pagination and Search Controls -->
            <div class="px-4 pt-32 md:px-10 pb-16 mx-auto w-full -m-24">
                <div class="flex justify-between px-4 pb-4 items-center">
                    <!-- Pagination Dropdown -->
                    <div>
                        <label for="itemsPerPage" class="text-sm text-blueGray-500">Items per page:</label>
                        <select id="itemsPerPage" v-model="itemsPerPage" class="block mt-1 w-20">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <!-- Search Input -->
                    <div>
                        <input
                            type="text"
                            v-model="searchQuery"
                            placeholder="Search transactions..."
                            class="block mt-1 w-40 px-2 py-1 border border-gray-300 rounded-md"
                        />
                    </div>
                </div>

                <!-- Transaction Table -->
                <div class="flex flex-wrap mt-4">
                    <div class="w-full xl:w-full mb-12 xl:mb-0 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <!-- Table Header -->
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-blueGray-700">
                                            Transactions
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Body -->
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                    <tr>
                                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Transaction Date
                                        </th>
                                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Transaction Amount
                                        </th>
                                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Starting Balance
                                        </th>
                                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Ending Balance
                                        </th>
                                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Description
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Loop through filtered and paginated transactions -->
                                    <tr v-for="transaction in paginatedTransactions" :key="transaction.id">
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ transaction.Transactiedatum }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ transaction.Transactiebedrag }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ transaction.Beginsaldo }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ transaction.Eindsaldo }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ transaction.Omschrijving }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

export default {
    name: "transactions-page",
    components: {DashboardLayout},
    props: ["transactions"],
    data() {
        return {
            itemsPerPage: 10, // Default items per page
            searchQuery: "",  // User-entered search query
        };
    },
    computed: {
        // Filtered transactions based on search query
        filteredTransactions() {
            return this.transactions.filter((transaction) =>
                transaction.Omschrijving.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        },
        // Paginated transactions
        paginatedTransactions() {
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            return this.filteredTransactions.slice(startIndex, startIndex + this.itemsPerPage);
        },
        // Current page number (1-indexed)
        currentPage() {
            return 1;
        },
    },
};
</script>

<style>
/* Add your CSS styles here for formatting */
</style>
