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
        name: "InvestModal",
        data(){
            return {
                show:false
            };
        },
        created(){
            this.$parent.$on('hide-invest', (e) => {
                this.show = e;
            });
            this.$parent.$on('show-invest', (e) => {
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
    .p{
        &::-webkit-scrollbar{
            width:6px;
        }

        &::-webkit-scrollbar-track{
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            width:6px;
            border-radius: 10px;
        }

        &::-webkit-scrollbar-thumb {
            border-radius: 10px;
            width:6px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.5);
        }
    }
</style>
