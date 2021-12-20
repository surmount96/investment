/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');
import VueChatScroll from 'vue-chat-scroll';
import Vodal from 'vodal';

Vue.component(Vodal.name, Vodal);
import VModal from 'vue-js-modal';
Vue.use(VModal, { dialog: true });
Vue.use(VueChatScroll);

import 'vue-js-modal/dist/styles.css'
import "vodal/common.css";
import "vodal/rotate.css";
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('Chat', require('./components/Chat.vue').default);
Vue.component('CustomModal', require('./components/CustomModal.vue').default);
Vue.component('ProfileModal', require('./components/ProfileModal.vue').default);
Vue.component('InvestModal', require('./components/InvestModal.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data(){
        return{
            show:true,
            referral: false,
            invest:false,
            profile_update:false,
            r_modal:false,
        }
    },
    mounted(){
        if(window.screen.width < 760) this.show = false;
        // this.$modal.show('profile-update');
        // this.invest = true;
        this.$emit('show-profile',true);
        this.$emit('show-invest',true);
    },
    methods:{
        menuControl(){
            this.show = !this.show;
        },
        hideInvest() {
            this.$emit('hide-invest', false);
        },
        hideProfile() {
            this.$emit('hide-profile', false);
        },
        copy(){
           this.$refs.input.select();
          try{
              let success = document.execCommand('copy');
              let msg = success ? 'Successfully' : '';
              alert('code copied '+msg);
          }catch(err){
              alert('Oops, unable to copy');
          }
        },
        referralModal(){
            this.$emit('show-referral',true);
        },
        hideReferral(){
            this.$emit('hide-referral',false);
        },
        toggleReferral(){
            this.referral = !this.referral;
        },
        withdraw(){
            this.$modal.show('dialog', {
                title: 'Withdraw',
                text: 'You can\'t withdraw at the early stage of the investment, please check back 25 working days later.',
                buttons: [
                    {
                        title: 'ok',
                        class:'bg-orange text-white focus:outline-none py-3 mx-32 my-2',
                        handler: () => {
                            this.$modal.hide('dialog')
                        }
                    },
                ]
            })
        },
        pay(){
            this.$modal.show('dialog', {
                title: 'Payment',
                text: 'This money goes into the user\'s wallet as money paid out.',
                buttons: [
                    {
                        title: 'ok',
                        class:'bg-orange text-white focus:outline-none py-3 mx-32 my-2',
                        handler: () => {
                            this.$modal.hide('dialog')
                        }
                    },
                ]
            })
        }
    }
});
