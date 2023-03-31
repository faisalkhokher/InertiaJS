<template>
    <div>
        <p class="text-xl font-bold text-gray-900" style="color:red">Categories {{ this.$store.state.count }}</p>
        <br>
        <!-- <button @click="this.$store.commit('INCREASE_COUNT', 1)">Increment</button> -->
        <button @click="vuex()">ADD</button>
        <br>
        <button @click="INCREASE_COUNT(4)">Mutation</button>
        <br>
        <button @click="INCREASE_ACTION(10)">Action</button>

        {{title }}
        <form @submit.prevent="save">
            <div class="mb-6">
                <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Your Text</label
                >
                <input
                    type="text"
                    v-model="title"
                    name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{ form?.errors?.title }}
                </p> 
                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="v$.title.$errors[0]">
                    {{v$.title.$errors[0].$message }}
                </p>
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Your Email</label
                >
                <input
                    type="text"
                    v-model="email"
                    name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{ form.errors.email }}
                </p>
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Your Password</label
                >
                <input
                    type="text"
                    v-model="password"
                    name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{ form.errors.password }}
                </p>
            </div>
            <button
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Submit
            </button>
        </form>
    </div>
    
    <Modal ref="openModal">
        <template #context>
            <div>
                <h1>This Context Is From Parent</h1>
                <button @click="closing">CLOSE</button>
            </div>
        </template>
    </Modal>
    <!--  -->
    <Banner
        :categories="categories"
        title="DYNAMIC TITLE"
        @update-post="onUpdatePost"
        @childComponentCall="callComponent"
        @log="logger"
        @client="driver"
    >
    <template v-slot:jobcads>
        <!-- component -->
        <div class="bg-white pt-12 pr-0 pb-12 pl-0 mt-0 mr-auto mb-0 ml-auto sm:py-16 lg:py-20">
        <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto sm:flex sm:items-center sm:justify-between">
                <div>
                <p class="text-xl font-bold text-gray-900">Open Positions</p>
                <p class="text-sm mt-1 mr-0 mb-0 ml-0 font-semi-bold text-gray-500">Lorem ipsum dolor sit amet, consectetur
                    adipis</p>
                </div>
                <div class="mt-4 mr-0 mb-0 ml-0 sm:mt-0">
                <p class="sr-only">Search Position</p>
                <div class="relative">
                    <div class="flex items-center pt-0 pr-0 pb-0 pl-3 absolute inset-y-0 left-0 pointer-events-none">
                    <p>
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                            stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21
                            21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </p>
                    </div>
                    <input placeholder="Search Positions " type="search" class="border block pt-2 pr-0 pb-2 pl-10 w-full py-2
                        pl-10 border border-gray-300 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm"/>
                </div>
                </div>
            </div>
            <div class="shadow-xl mt-8 mr-0 mb-0 ml-0 pt-4 pr-10 pb-4 pl-10 flow-root rounded-lg sm:py-2">
                <div class="pt--10 pr-0 pb-10 pl-0">
                <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
                    <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
                    <div class="flex items-center flex-1 min-w-0">
                        <img
                            src="https://d34u8crftukxnk.cloudfront.net/slackpress/prod/sites/6/SlackLogo_CompanyNews_SecondaryAubergine_Hero.jpg?d=500x500&amp;f=fill" class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10"/>
                        <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                        <p class="text-lg font-bold text-gray-800 truncate">Engineering Manager</p>
                        <p class="text-gray-600 text-md">Slack</p>
                        </div>
                    </div>
                    <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:mt-0">
                        <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
                            duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
                    </div>
                    </div>
                </div>
                <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
                    <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
                    <div class="flex items-center flex-1 min-w-0">
                        <img src="https://www.growthmarketingpro.com/wp-content/uploads/2019/10/basecamp-logo.png"
                            class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10"/>
                        <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                        <p class="text-lg font-bold text-gray-800 truncate">Senior Software Engineer</p>
                        <p class="text-gray-600 text-md">Basecamp</p>
                        </div>
                    </div>
                    <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:justify-end
                        sm:mt-0">
                        <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
                            duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
                    </div>
                    </div>
                </div>
                <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
                    <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
                    <div class="flex items-center flex-1 min-w-0">
                        <img src="https://djmag.com/sites/default/files/article/image/Spotify.png" class="flex-shrink-0
                            object-cover rounded-full btn- w-10 h-10"/>
                        <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                        <p class="text-lg font-bold text-gray-800 truncate">Frontend Developer</p>
                        <p class="text-gray-600 text-md">Spotify</p>
                        </div>
                    </div>
                    <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:justify-end
                        sm:mt-0">
                        <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
                            duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
                    </div>
                    </div>
                </div>
                <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
                    <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
                    <div class="flex items-center flex-1 min-w-0">
                        <img src="https://miro.medium.com/max/512/1*n81Kr3UGUVsF0LLRgRQrJw.jpeg" class="flex-shrink-0
                            object-cover rounded-full btn- w-10 h-10"/>
                        <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                        <p class="text-lg font-bold text-gray-800 truncate">Lead Software Engineer</p>
                        <p class="text-gray-600 text-md">Figma</p>
                        </div>
                    </div>
                    <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:justify-end
                        sm:mt-0">
                        <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
                            duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
                    </div>
                    </div>
                </div>
                <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
                    <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
                    <div class="flex items-center flex-1 min-w-0">
                        <img src="https://i.pinimg.com/originals/96/02/08/9602083f42463bb813399310d72233c5.png"
                            class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10"/>
                        <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                        <p class="text-lg font-bold text-gray-800 truncate">Software Engineeer</p>
                        <p class="text-gray-600 text-md">Pinterest</p>
                        </div>
                    </div>
                    <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:justify-end
                        sm:mt-0">
                        <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
                            duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </template>
    </Banner>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { ref } from "vue";
import Banner from "./Banner-Componenet.vue";
import useValidate from '@vuelidate/core'
import { required } from '@vuelidate/validators'
import Modal from '../modal/sheet.vue'
import { mapActions, mapMutations, useStore } from 'vuex'
import { useState, useActions } from 'vuex-composition-helpers/dist'
// import store from '@/store'

export default {
    data() {
        return {
            v$: useValidate(),
            title: "",
            password: "",
            email: "",
        };
    },
    validations() {
    return {
        title: { required },
      }
    },
    components: {
        Banner,
        Modal
    },
    props: {
        categories: Array,
    },
    setup(props) {
        // const title = ref();
        const form = useForm({
            text: "",
            password: "",
            categories: props.categories,
        });
        // const {count} = useState(['count']);
        return { form };
    },
    methods: {
        save() {

            console.log("WARNING "+this.title);
            
            // Open Modal
            this.$refs.openModal.myBtn();

            

            console.log(this.v$.$validate());
            console.log(this.v$.$error);
            // if (this.v$.$error == true) {
            //     // if ANY fail validation
            //     console.log(this.v$.title.$errors[0].$message);
            //     alert('Form failed validation')
                
            // } else {
            //     alert('Form successfully submitted.')
            // }
            
            this.form.text = "TITLE";
            console.log("FORM => " + this.form.text);
            console.log("DATA => " + this.title);
            // console.log(this.data);
            axios
                .post(
                    route("save-category", {
                        title: this.title,
                        password: this.password,
                    })
                )
                .then((result) => {
                    let data = result.data;
                    console.log(data);
                    if (data == false) {
                        console.log("IF");
                        this.form.setError("email", "Your error message.");
                    } else {
                        this.form.clearErrors();
                    }
                })
                .catch((err) => {
                    let errors = err.response?.data?.errors || [];
                    console.log("ERR" + errors);

                    // ! Validation show with for
                    for (let index in errors) {
                        console.error("error -> ", errors[index][0]);
                        this.form.errors[index] = errors[index][0];
                    }

                    //! Validation show with manually
                    // if (errors) {
                    //     this.form.errors.title = errors.title[0];
                    //     this.form.errors.password = errors.password[0];
                    // }
                });
        },
        onUpdatePost($event) {
            event.preventDefault();
            console.log("CALL");
        },
        callComponent(id) {
            console.log("Componenet - Calling ");
            console.log(id);
        },
        logger(value){
            console.log(value);
        },
        driver(value) {
            console.log('Parent Trigger');
            console.log("Driver Listen to Client "+value); 
        },
        closing(){
            this.$refs.openModal.close();
        },
        vuex(){
            console.log('VUEX');
            // const store = this.$store;
            // store.commit('INCREASE_COUNT',10);
            // mapMutations(['INCREASE_COUNT']),
            // Commit Mutation
            // return this.$store.commit('INCREASE_COUNT',2)
            // Commit Actions
            // return this.$store.dispatch('INCREASE_ACTION',5)
        },
        ...mapMutations(['INCREASE_COUNT']),
        ...mapActions(['INCREASE_ACTION']),
    },
    computed: {
        appends() {
            // return this.title
            //     .split('')
            //     .reverse()
            //     .join('');
            return this.$store.state.count
        }
    },
    watch : {
        title(value,old){
            console.log(value,old);
        }
    },
    mounted() {
        this.$refs.modalInput.focus()
        console.log(this.$store);
        
    },
    beforeMount() {
        console.log(this.$store);
    },
};
</script>
