<template>
    <div class="ml-4">
        <div class="font-sans text-black bg-white flex items-center justify-center">
            <div class="border rounded overflow-hidden flex">
                <input type="text" class="px-4 py-2" placeholder="Search..." v-model="searchQuery">
            </div>
        </div>

        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Email
                        </th>
                        <th scope="col" class="py-3 px-6">
                           Time
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="user in filterLeads">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ user.name }}
                        </th>
                        <td class="py-4 px-6">
                            {{ user.email }}
                        </td>
                        <td class="py-4 px-6">
                            {{ moment(user.created_at).format("MMM Do YY") }}
                        </td>
                        <td class="py-4 px-6">

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';
export default {
    data() {
        return {
            users: [],
            searchQuery : null,
            moment
        }
    },
    methods: {
        fetchUsers: async function () {
            try {
                let response = await axios.post(route('fetch.user'));
                this.users = response.data;
                console.log(response.data);
            } catch (error) {
                console.log(error);
            }
        }
    },
    computed: {
        filterLeads() {
        let thisR = this;
        return this.users.filter( function(item) {
            if (thisR.searchQuery) {
                console.log("Hitting");
                return (item.name?.toLowerCase() || "" ).includes(thisR.searchQuery.toLowerCase())||
                (item.email?.toLowerCase()).includes(thisR.searchQuery.toLowerCase());
                return true;
            } else {
                thisR.users;
                return true;
            }
        });
    }
    },
    async mounted() {
        console.log("A");
        await this.fetchUsers();
    }
}
</script>

