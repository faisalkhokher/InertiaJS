<template>
    <div>
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
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { ref } from 'vue';
export default {
    data() {
        return {
            title: "",
            password: "",
            email: "",
        };
    },
    props : {
        categories:Array 
    },
    setup(props) {
        // const title = ref();
        const form = useForm({
            text: "",
            password: "",
            categories: props.categories,
        });
        return { form ,title};
    },
    methods: {
        save() {
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
    },
    mounted() {
        console.log(this.form.categories);
    },
};
</script>
