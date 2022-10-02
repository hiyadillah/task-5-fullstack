<template>
    <Head page="dashboard" :commits="commits" />
    <div class="row justify-content-center border border-dark lg:mx-5">
        <div
            v-for="{ id, title, content, image } in commits"
            v-bind:key="id"
            class="card md:mx-5 mx-1 my-5 w-25"
            style="width: 18rem"
        >
            <img :src="image" class="card-img-top" style="" alt="..." />
            <div class="card-body">
                <h5 class="card-title">{{ title }}</h5>
                <p class="card-text">{{ content }}</p>
                <a :href="url + id" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>
</template>

<script>
import Head from "./Head.vue";
const API_URL = `http://127.0.0.1:8000/api/v1/article`;
const URL = `http://127.0.0.1:8000/detail/`;
export default {
    // data yang ada pada komponen1
    data: () => ({
        url: URL,
        link: null,
        commits: 0,
    }),
    beforeCreate() {
        console.log("beforeCreate");
    },
    created() {
        console.log("Created");
        this.fetchData();
    },
    beforeMount() {
        console.log("beforeMount");
    },
    // ketika komponen dipasang
    mounted() {
        console.log("Mounted");
    },
    beforeUpdate() {
        console.log("beforeUpdate");
    },
    updated() {
        console.log("Updated");
    },
    // ketika component dibuat
    // list metode
    methods: {
        async fetchData() {
            this.commits = await (await fetch(API_URL)).json();
            this.commits = this.commits.data;
        },
        async cek(data1) {
            console.log("Masuk Fungsi Cek");
            console.log("Isi Data1: " + JSON.stringify(data1));
        },
        async ubah() {
            console.log(this.commits);
            this.link = (await URL) + this.commits;
        },
        async klik() {
            console.log("tombol telah di klik");
        },
    },
    components: { Head },
};
</script>
