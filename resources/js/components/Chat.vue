<template>
    <div class="flex flex-wrap">
        <div class="lg:w-4/6 md:w-4/6 w-full mb-4 mx-auto ">
            <div class="bg-blue-deep h-16 rounded-lg flex items-center justify-between">
                <div class="flex items-center">
                    <div class="">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-narrow-left w-16 text-white h-6"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="text-white ml-3" v-if="username">
                        <p class="" style="line-height: 16px">{{ username.name }}</p>
                        <small style="font-size: 10px" v-if="typing">
                            <span>typing</span>
                        </small>
                        <small style="font-size: 10px" v-else>
                            <span v-if="username.isOnline">Online</span>
                            <span v-else>Offline</span>
                        </small>

                    </div>
                </div>
                <div class="mr-4">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="lock-closed w-12 text-white h-6"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                </div>
            </div>
            <div class="overflow-y-scroll p bg-gray py-4" v-chat-scroll="{alawys: false,smooth:true}" :class="{'h-64 ': receiver_id}" v-if="auth_user && receiver_id">
                <div class="flex items-center py-2" v-for="message in messages" :key="message.id" v-if="auth_user.id">
                    <div class="mt-3" v-if=" message.sender_id != auth_user.id">
                        <img src="/img/man.svg" alt="" class="w-10 h-8 rounded-full border border-gray mx-4">
                    </div>
                    <div class=" bg-blue-deep text-white lg:p-4 md:p-4 p-2 mb-2 rounded-lg lg:w-128 md:w-128 w-64" :class="{' bg-orange text-white ml-auto mr-3': message.sender_id == auth_user.id}">
                        <p >{{ message.body }}</p>
                        <small class="text-right block">{{ message.created_at | changeDate}}</small>
                    </div>
                </div>
            </div>

            <div class=" flex bg-blue-deep rounded-lg py-2 px-10 text-medium" :class="{'mt-5': !receiver_id}">
                <input type="text" v-model="message" placeholder="Type a message ..." class="rounded-lg pl-5 pr-10 focus:outline-none border border-gray py-3 w-full" @keydown="isTyping" @keyup.enter="sendMessage">
                <button class="bg-orange text-white w-48 text-center py-3 rounded-lg focus:outline-none" style="margin-left: -1.4rem" @click="sendMessage">send</button>
            </div>
        </div>
        <div class="lg:w-2/6 md:w-2/6 w-full mb-4 mx-auto px-2">
            <div class="bg-white p-4 shadow-lg">
                <h3 class="font-bold border-b border-gray pb-3">
                    Message
                </h3>
                <div class=" my-4 text-medium cursor-pointer " v-if="auth_user.id == super_admin.id">
                    <div class="" v-for="user in users" :key="user.id">
                        <div class="flex items-center relative">
                            <img src="/img/person.svg" alt="" class="w-10 h-10 rounded-full border border-gray mx-4">
                            <p class="ml-2 text-blue flex items-center" @click="saveId(user.id)">
                                <span>
                                    <span v-if="user.isOnline">
                                        <span class="h-2 block mr-2 w-2 rounded-full bg-green-light"></span>
                                    </span>
                                    <span v-else>
                                        <span class="h-2 block w-2 mr-2 rounded-full bg-gray-300"></span>
                                    </span>
                                </span>
                                {{ user.name }}
                            </p>
                            <div class="" v-if="newMessage">
                                <span class="flex items-center justify-center h-3 w-3 rounded-full bg-red text-white absolute top-0 right-0 mb-4 mr-12 pt-1" style="font-size: 8px">1</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center my-4 text-medium cursor-pointer " v-else>
                    <img src="/img/person.svg" alt="" class="w-10 h-10 rounded-full border border-gray mx-4">
                    <p class="ml-2 text-blue flex items-center" @click="saveId(super_admin.id)"  >
                        Administrator
                    </p>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import moment from "moment";
    export default {
        name: "Chat",
        props:{
            users: { type: Array}
        },
        data(){
            return {
                message: null,
                messages: [],
                receiver_id:'',
                auth_user:'',
                username:'',
                typing: false,
                super_admin:'',
                newMessage:false,
            };
        },
        created(){
            Echo.private('kilenra-chat')
                .listen('MessageSent', (e) => {
                    // console.log(e);
                    this.messages.push(e.message);
                    if(e.message){
                        this.newMessage = true;
                    }
                });

            let _this = this;

            Echo.private('kilenra-chat')
                .listenForWhisper('typing', (e) => {
                    this.typing = e.typing;

                    // remove is typing indicator after 0.9s
                    setTimeout(function() {
                        _this.typing = false
                    }, 900);
                });
            axios.get('/user')
                .then(res => { this.auth_user = res.data;} );
            axios.get('/api/admin')
                .then(res => { this.super_admin = res.data; } );
        },
        filters:{
            changeDate(value){
                return moment(value).format('h:mm a');
            }
        },
        methods:{
            isTyping(){
                let channel = Echo.private('kilenra-chat');
                this.newMessage = false;
                setTimeout(function() {
                    channel.whisper('typing', {
                        typing: true
                    });
                }, 900)
            },
            getMessage(){
                axios.get('/chat',{
                    params:{
                        receiver_id: this.receiver_id,
                        sender_id: this.auth_user.id
                    }
                })
                    .then(res => { this.messages = res.data;});
            },
            sendMessage(){
                if (this.message.length != ''){
                    let params = {
                        body: this.message,
                        receiver_id: this.receiver_id
                    };
                    // this.messages.push({message});
                    axios.post('/store/chat',params)
                        .then(() => {
                            this.message = '';
                            this.getMessage();
                            // console.log(res)
                        });
                    // console.log(this.message);

                }
            },
            saveId(id){
                this.receiver_id = id;
                axios.get('/username',{
                    params:{
                        receiver_id: this.receiver_id,
                    }
                })
                    .then(res => { this.username = res.data; });
                this.getMessage();
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
