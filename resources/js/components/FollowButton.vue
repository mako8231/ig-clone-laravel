<template>
    <div>
        <button v-text="buttonText" @click="followUser" class="btn btn-primary" style="margin-left: 20px;"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function (){
            return {
                status: this.following,
            }
        },
        computed: {
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        },
        props: ['user_id', 'following'],
        methods: {
            followUser : function()
            {
                axios.post(`/follow/${ this.user_id }`)
                    .then(response => {
                        this.status = !this.status;
                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status === 401){
                            window.location = '/login';
                        }
                    });
            }
        }
    }
</script>
