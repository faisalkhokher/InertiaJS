<template>

    <form>
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search Mockups, Logos..." required="" v-model="search" ref="search" attr="UNI-789">
            <!-- <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button> -->
        </div>
    </form>

    <!-- Render -->
    <slot name="as"></slot>

    <div class="grid grid-cols-3 gap-5 md:container md:mx-auto">
        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"
            v-for="list in fetchComputedList">
            <a href="#">
                <!-- <img class="rounded-t-lg" :src="list.poster" alt=""> -->
                <v-lazy-image class="rounded-t-lg" :src="list.poster" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ list.title }}
                    </h5>
                </a>

                <lazy-text class="mb-3 font-normal text-gray-700 dark:text-gray-400" :src="list.description">
                </lazy-text>
                <p>
                    directed_by {{ list.directed_by }}
                </p>
                <a @click="countM($event)" dataAtr="1234" :class="{ invisible: value2 }"
                    class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more {{ count }}
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <button :class="{ invisible: value1 }" type="button" class="py-2.5 px-5 mr-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center">
                    <svg role="status" class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                    </svg>
                    Loading...
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import VLazyImage from "v-lazy-image";
import LazyText from 'vue-lazyload-text'

export default {
    props: {
        name: String
    },
    components: {
        VLazyImage,
        LazyText,

    },
    data() {
        return {
            lists: [],
            search: '',
            count: 0,
            disabled : true,
            value1: true,
            value2: false
        }
    },
    methods: {
        fetchRecord() {
            const options = {
                method: 'GET',
                url: 'https://www.fakerestapi.com/datasets/api/v1/movie-details-dataset.json',
            };

            let thisR = this;
            axios.request(options).then(function (response) {
                thisR.lists = response.data.data
            }).catch(function (error) {
                console.error(error);
            });
        },
        countM(event) {
            this.count++
            // Get attr value
            let element = event.currentTarget	
            element.getAttribute('dataAtr')
            this.value1 = false;
            this.value2 = true;
        }
    },
    // used to processing data on current page
    computed: {
        fetchComputedList() {
            let thisR = this;
            return thisR.lists.filter((item) => {
                if (thisR.search) {
                    // console.log(this.$refs.search.attr);
                    return (item.title.toLowerCase()).includes(thisR.search.toLowerCase()) ||
                        (item.directed_by.toLowerCase()).includes(thisR.search.toLowerCase());
                }
                return true
            })
        },
        countFetch(){
            this.countM
        }
    },
    mounted() {
        this.fetchRecord()
    },
    watch: {
        search(value){
            console.log(value);
        }
    }

}
</script>

<style lang="css">
    .invisible {
    visibility: hidden;
  }
</style>