<template>
    <div class="container">
        here it is
        <pre> {{ user }} </pre>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            user: null
        };
    },
    mounted() {
        this.getUser();
    },
    methods: {
        async getUser() {
            let response = axios.get("/api/user");
            this.user = response.data;
        }
    }
};
</script>
