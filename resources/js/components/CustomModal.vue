<template>
    <div class="" v-show="show">
        <div class="fixed top-0 left-0 flex flex-col justify-center" style="height:100%; width:100%; z-index:999999; background-image: linear-gradient(to right, rgba(0,0,0,.4), rgba(0,0,0,.4)" >
            <div class="lg:w-2/3 md:w-2/3 w-full mx-auto ">
                   <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CustomModal",
        data(){
            return {
              show:false
            };
        },
        created(){
            this.$parent.$on('hide-referral', (e) => {
                this.show = e;
            });
            this.$parent.$on('show-referral', (e) => {
                this.show = e;
            });
        },
        methods:{
            toggleModal(){
                this.show = !this.show;
            }
        }
    }
</script>

<style lang="scss">
</style>
