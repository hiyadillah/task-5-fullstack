<template>
    <Head page="detail" :commits="this.commits" />
    <div class="mx-1 border border-dark">
        <div class="m-5">
            <h1 class="fs-1">{{ commits.title }}</h1>
        </div>
        <div class="m-5">
            <p class="fs-4">
                {{ commits.content }}
            </p>
        </div>
    </div>
</template>

<script>
import Head from "./Head.vue";
const API_URL = `http://127.0.0.1:8000/api/v1/article/`;
export default {
    name: "Detail",
    props: {
        article: String,
    },
    data: () => ({
        commits: "asda",
    }),
    beforeCreate() {
        console.log("beforeCreate");
    },
    created() {
        console.log("Created");
        this.fetchData();
        console.log(API_URL + parseInt(this.article));
    },
    beforeMount() {
        console.log("beforeMount");
    },
    mounted() {
        console.log("Mounted");
    },
    beforeUpdate() {
        console.log("beforeUpdate");
    },
    updated() {
        console.log("Updated");
    },
    methods: {
        async fetchData() {
            this.commits = await (
                await fetch(API_URL + parseInt(this.article))
            ).json;
            this.commits = this.commits.data;
            console.log("Tipe Commit di component: " + this.commits);
            console.log(this.commits);
        },
    },
    components: { Head },
};
</script>
