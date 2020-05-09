<template>
    <div>
        <input
            type="file"
            class="mb-2"
            name="image"
            @change="getImage"
            accept="image/*"
        />
        <img :src="avatar" class="d-block w-100" alt="avatar" />
        <a v-if="loaded" class="btn btn-success mt-2" @click.prevent="upload"
            >Upload</a
        >
        <a v-if="loaded" class="btn btn-danger mt-2" @click.prevent="cancel"
            >Cancel</a
        >
    </div>
</template>

<script>
export default {
    props: ["user"],
    data() {
        return {
            avatar: "/storage/" + this.user.avatar,
            loaded: false
        };
    },
    methods: {
        getImage(e) {
            let image = e.target.files[0];
            this.readImage(image);
        },
        upload() {
            axios
                .post("/upload", { image: this.avatar })
                .then(res =>
                    this.$toasted.show("hello billo", { type: "success" })
                )
                .catch(err => this.$toasted.show("Error", { type: "error" }));
        },
        readImage(image) {
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e => {
                this.avatar = e.target.result;
            };
            this.loaded = true;
        },
        cancel() {
            this.avatar = "/storage/" + this.user.avatar;
            this.loaded = false;
        }
    }
};
</script>
