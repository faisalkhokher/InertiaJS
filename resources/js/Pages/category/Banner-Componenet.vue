<template>
    <div>
        <h1>Banner {{ title }}</h1>
        <div v-for="category in categories" :key="category">
            <li>{{ category }}</li>
        </div>
        <form>
            <input type="text" ref="myInput" />
            <button @click="$emit('updatePost')" class="btn" id="1">
                Call
            </button>
            <br />
            <button
                @click="$emit('childComponentCall')"
                id="0011445566"
                class="btn"
            >
                EMIT
            </button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        categories: Array,
    },
    emits: ["updatePost", "childComponentCall"],
    mounted() {},
};
</script>
