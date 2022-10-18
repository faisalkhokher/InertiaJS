<template>
    <div class="ml-4">
        <div class="font-sans text-black bg-white flex items-center justify-center">
            <div class="border rounded overflow-hidden flex">
                <input type="text" class="px-4 py-2" placeholder="Search name , user , category " v-model="search">
            </div>
        </div>

        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an
            option</label>
        <select v-model="category_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Select</option>
            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
        </select>


        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Post Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            User Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Category
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="query in posts">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{query.name }}
                        </th>
                        <td class="py-4 px-6">
                            {{ query.user.name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ query.category.name }}
                        </td>
                        <td class="py-4 px-6">
                            <!-- {{ query.created_at }} -->
                            <!-- {{ posts.total }} -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
        <v-pagination
        v-model="page"
        :pages="no_of_pages"
        :range-size="1"
        active-color="#DCEDFF"
        @update:modelValue="() => fetchPosts()"
        />
</template>

<script>
import axios from 'axios'
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";

export default {
    data() {
        return {
            page : 1,
            posts : [],
            no_of_pages : 0,
        }
    },
    methods: {
        fetchPosts (){
            axios.post('/get/posts' , {
                page : this.page
            }).then((res) => {
                this.posts = res.data.posts
                this.no_of_pages = res.data.no_of_pages
            }).catch((err) => {

            });
        }
    },
    components: {
        VPagination
    },
    async mounted() {
        this.fetchPosts();
    },
}
</script>
