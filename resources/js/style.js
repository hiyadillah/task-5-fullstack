async function createArticle() {
    await fetch("http://127.0.0.1:8000/api/v1/article/create" + this.id, {
        method: "GET",
        headers: {
            Authorization: `Bearer ${this.tkn}`,
        },
    })
        .then((res) => res.json())
        .then((ts) => (this.user = ts))
        .then((json) => console.log(json));
}
