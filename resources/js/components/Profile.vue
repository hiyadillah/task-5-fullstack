<template>
    <div class="contrainer mb-5 mx-5 border border-black" id="identitas">
        <h1 class="fs-1">Identitas</h1>

        <div v-for="(value, name, index) in user" :key="value">
            <span class="fs-5" v-if="index !== 0">
                {{ name }}: {{ value }}
            </span>
        </div>
    </div>
    <div class="row justify-content-center border border-dark mx-5 mt-5 mr-5">
        <div class="d-flex justify-content-between">
            <span class="fs-1"> Postingan </span>
        </div>
        <div class="card" v-for="(value, name, index) in articles" :key="value">
            <div class="card-body">
                <span class="card-text"> </span>
                <span>
                    <a href="#" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </span>
                <span>
                    <a href="#" class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </span>
            </div>
        </div>
    </div>
</template>
<script>
const URL_API = `http://127.0.0.1:8000/api/v1/`;
export default {
    props: {
        tkn: [String, Number],
        id: [String, Number],
        ck: [String, Number],
    },
    data: () => ({
        user: "dummy",
        articles: "asdas",
    }),
    beforeCreate() {
        console.log("beforeCreated");
    },
    created() {
        console.log("created");
        this.fetchData();
    },
    mounted() {
        console.log("mounted");
    },
    beforeUpdate() {
        console.log("beforeUpdate");
    },
    updated() {
        console.log("updated");
    },
    methods: {
        async fetchData() {
            // ASKING RESOURCE FROM API RESOURCE
            await fetch(URL_API + "user/" + this.id, {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${this.tkn}`,
                },
            })
                .then((res) => res.json())
                .then((ts) => (this.user = ts))
                .then((json) => console.log(json));
            this.user = this.user.data;
            this.articles = this.user.article;
            console.log(`Commit:` + this.user);
        },
    },
};
</script>
