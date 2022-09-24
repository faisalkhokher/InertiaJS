<template>
    <div>
        First Name <input type="" name=""    v-model="form.name">
        <button @click="update">Update</button>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';



export default {
    data() {
        return {
            'post_id' : this.post.id
        }
    },
    props : {
        post : Object
    },
    setup(props) {
        let form = useForm({
            name : '',
            post_id : props.post.id,
    })
    return { form };
    },
    methods: {
        update() {
            this.form.post(route('updating'), this.form)
        }
    }
}
</script>
