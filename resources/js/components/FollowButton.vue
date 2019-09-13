<template>
    <div>
        <button @click="followUser" class="btn btn-sm btn-info ml-3" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props:['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                status: this.follows,
            }
        },
        methods: {
            followUser(){
                axios.post('/follow/'+ this.userId)
                .then(Response => {
                    this.status = !this.status;
                    console.log(Response.data);
                }).catch(errors => {
                    if(errors.response.status == 401){
                        window.location = '/login';
                    }
                });
            }
        },
        computed: {
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        },
    }
</script>
