<template>
    <header
        id="head"
        class="masthead"
        :style="{
            'background-image': `url(${img})`,
        }"
    >
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Kumpulan Blog Terbaru</h1>
                        <span class="subheading"
                            >Blog disediakan oleh ilham iyadillah</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "Head",
    props: {
        commits: Object,
        page: String,
    },
    data: () => ({
        dash: `img/home-bg.jpg`,
        profile: `img/about-bg.jpg`,
        img: `dusmm`,
    }),
    mounted() {
        console.log("Head Mounted.");
    },
    created() {
        console.log("ini adalah things  " + this.img);
    },
    beforeCreate() {
        this.preProcess();
    },
    methods: {
        preProcess() {
            if (this.page === "dashboard") {
                this.img = this.dash;
            } else if (this.page === "profile") {
                this.img = this.profile;
            } else {
                this.img = this.commits.image;
            }
        },
    },
};
</script>
