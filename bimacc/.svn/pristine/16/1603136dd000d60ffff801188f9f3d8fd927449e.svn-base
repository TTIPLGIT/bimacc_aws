<template>
    <b-container fluid class="hearing-b-container">
        <b-row >            
            <b-col md="4" sm="12" class="hearing-b-left-col">
                <div v-for="row in loginUser" :key="row.id">
                <div class="contact-row contact-head">
                    <div class="contact-col-md-2">
                        <div class="circle circle-border">
                            <div class="circle-inner">
                                <img v-bind:src="row.image_path" v-if="row.image_name != null  && row.image_name != ''">
                                <div class="score-text" v-if="row.image_name == '' || row.image_name == null">
                                    {{ row.short_name }}                      
                                </div>
                             </div>
                        </div>
                    </div>
                    <div class="contact-col-md-10"> 
                        <div class="contact-head-text" v-if="row.id">{{ row.name }}</div>
                    </div>
                    <div v-if="row.usertype == 1"><i class="fa fa-university" aria-hidden="true"></i></div>
                    <div v-if="row.usertype == 2"><i class="fa fa-server" aria-hidden="true"></i></div>
                    <div v-if="row.usertype == 3"><i class="fa fa-balance-scale" aria-hidden="true"></i></div>
                    <div v-if="row.usertype == 4"><i class="fa fa-street-view" aria-hidden="true"></i></div>        
                </div>
                </div>
                <div v-if="loading">Online Arbitration Hearing</div>
                <div class="contact-body" :set="claim=0">
               
                   
                   <div v-for="(contacts_petition, index) in contacts_petition">
                   <div :set="claim1=contacts_petition.claim_id">
                   <details>
                   <summary class="claim-head">{{ contacts_petition.claim_name }}</summary>
                     <div v-for="(contact, index) in contacts" v-if="claim1 == contact.claim_id">
                     
                     
                     
                        
                        <div class="contact-head">
                            <div :class="contact.usertype == 1 ? 'contact-row-center' : contact.usertype == 2 ? 'contact-row-claimant'  : contact.usertype == 3 ? 'contact-row-arbitrator' : contact.usertype == 4 ? 'contact-row-respondent' : ''">
                                <div class="contact-col-md-11" @click="selectedContact(index, contact)" >
                                    <span class="unread-message-count" v-if="contact.message_count !== 0">{{ contact.message_count }}</span>
                                    <div class="contact-row-override">
                                        <div class="contact-col-md-2">
                                            <div class="circle circle-border">
                                                <div class="circle-inner">
                                                    <img v-bind:src="contact.image_path" v-if="contact.image_name != null  && contact.image_name  != ''">
                                                    <div class="score-text" v-if="contact.image_name == '' || contact.image_name == null">
                                                        {{ contact.short_name }}
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contact-col-md-10">
                                            <div class="contact-head-text">{{ contact.name }}</div>
                                            <span class="typing-message" v-if="contact.message_typing !== ''">{{ contact.message_typing }}</span>
                                        </div> 
                                    </div>
                                </div>

                                <div class="contact-col-md-1" v-if="contact.loginUserType == 3 && contact.usertype == 2 || contact.loginUserType == 3 && contact.usertype == 4">
                                    <div class="contact-head-text">
                                        <div v-if="contact.user_status == 1">
                                            <toggle-button :value="true" color="#38c172" :sync="true" @change="changeUserAccess(contact, $event.value)" />
                                        </div>
                                        <div v-else>
                                            <toggle-button :value="false" color="#38c172" :sync="true" @change="changeUserAccess(contact, $event.value)" />
                                        </div>
                                    </div>
                                </div>
                                <div v-if="contact.usertype == 1"><i class="fa fa-university" aria-hidden="true"></i></div>
                                <div v-if="contact.usertype == 2"><i class="fa fa-server" aria-hidden="true"></i></div>
                                <div v-if="contact.usertype == 3"><i class="fa fa-balance-scale" aria-hidden="true"></i></div>
                                <div v-if="contact.usertype == 4"><i class="fa fa-street-view" aria-hidden="true"></i></div>
                            </div>
                        </div>
                       
                       </div>
                        </details>
                    </div>
                    </div>
                </div>    
                </div>
            </b-col>

            <b-col md="8" sm="12" class="hearing-b-right-col">
                <div class="contact-user">
                    <div class="contact-row-selected contact-col-md-12" v-if="contact">
                        <div class="contact-col-md-1">
                            <div class="circle circle-border">
                                <div class="circle-inner">
                                    <img v-bind:src="contact.image_path" v-if="contact.image_name != null  && contact.image_name != ''">
                                    <div class="score-text" v-if="contact.image_name == '' || contact.image_name == null">
                                        {{ contact.short_name }}                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact-col-md-11">
                            <div class="contact-head-text">{{ contact.name }}</div>
                        </div>
                    </div>
                    <span class="contact-select-text" v-if="contact == ''"><i class="fa fa-arrow-left"></i>{{ contact ? '' : ' &nbsp;&nbsp;&nbsp;&nbsp;Select a Contact' }}</span>
                </div>

                <div class="messages-back" ref="messages">
                    <div class="messages-component"> 
                        <div v-for="row in loginUser" :key="row.id">       
                            <div v-for="message in messages" :key="message.id">
                                <div v-if="message.from_user_id != row.id">
                                    <!-- <div class="contact-row contact-col-md-12"> -->




                                        <div class="messanger">
                                        <div class="messages">                                                
                                            <div class="message">

                                                <div >
                                            <div class="circle circle-border message-circle">
                                                <div class="circle-inner">
                                                    <img v-bind:src="message.image_path" v-if="message.from_image_name != null  && message.from_image_name != ''">
                                    <div class="score-text" v-if="message.from_image_name == '' || message.from_image_name == null">
                                        {{ message.short_name }}                        
                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <!-- <div v-if="message.message_type == 'Private' && message.to_user_id == selectedUser"> -->
                                                <div class="info" v-if="message.attachment == 1">
                                                <p class="info" >
                                                    <a v-bind:href="message.file_link" target="new">
                                                        <img class="file-icon-size" v-if="message.file_extension == 'pdf'" v-bind:src="image_path + 'pdf_icon.png'">
                                                        <img class="file-icon-size" v-else-if="message.file_extension == 'xlsx' || message.file_extension == 'xls'" v-bind:src="image_path + 'excel_icon.png'">
                                                        <img class="file-icon-size" v-else-if="message.file_extension == 'docx' || message.file_extension == 'doc'" v-bind:src="image_path + 'word_icon.png'">
                                                        <img class="file-icon-size" v-else-if="message.file_extension == 'png' || message.file_extension == 'jpg'" v-bind:src="message.file_link">
                                                        <img class="file-icon-size" v-else v-bind:src="image_path + 'default_icon.png'">
                                                        {{ message.message_text }}
                                                    </a>
                                                    <br/>
                                                    <span class="sent-message-text-user">Hearing: {{ message.hearing_number }} {{ message.from_user_name }} {{ message.created_at }}</span>
                                                </p> 
                                                </div>
                                                <div class="info" v-else>
                                                    <p class="info" >{{ message.message_text }}
                                                    <br/>
                                                    <span class="sent-message-text-user">Hearing: {{ message.hearing_number }} {{ message.from_user_name }} {{ message.created_at }}</span>
                                                </p>
                                                </div> 
                                            <!-- </div> -->

                                            </div>
                                        </div>
                                    </div>



                                        
                                    <!-- </div> -->
                                </div>

                                <div v-if="message.from_user_id == row.id">
                                    <div class="messanger">
                                        <div class="messages">                                                
                                            <div class="message me">
                                                <div class="info" v-if="message.attachment == 1">
                                                    <p >
                                                        <a v-bind:href="message.file_link" target="new">
                                                            <img class="file-icon-size" v-if="message.file_extension == 'pdf'" v-bind:src="image_path + 'pdf_icon.png'">
                                                            <img class="file-icon-size" v-else-if="message.file_extension == 'xlsx' || message.file_extension == 'xls'" v-bind:src="image_path + 'excel_icon.png'">
                                                            <img class="file-icon-size" v-else-if="message.file_extension == 'docx' || message.file_extension == 'doc'" v-bind:src="image_path + 'word_icon.png'">
                                                            <img class="file-icon-size" v-else-if="message.file_extension == 'png' || message.file_extension == 'jpg'" v-bind:src="message.file_link">
                                                            <img class="file-icon-size" v-else v-bind:src="image_path + 'default_icon.png'">
                                                            {{ message.message_text }}
                                                        </a>
                                                        <br/>
                                                        <span class="sent-message-text-user">Hearing: {{ message.hearing_number }} {{ message.from_user_name }} {{ message.created_at }}</span>
                                                    </p>
                                                </div>
                                                <div class="info" v-else>
                                                    <p >{{ message.message_text }}
                                                        <br/>
                                                        <span class="sent-message-text-user">Hearing: {{ message.hearing_number }} {{ message.from_user_name }} {{ message.created_at }}</span>
                                                    </p>
                                                </div>                
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-row contact-row-message contact-col-md-12">
                    <div class="message-height">                    
                        <div class="message-component">
                            <textarea v-model="message" @keydown.enter.exact="sendMessage" @keydown.ctrl.enter.exact="newLine" @focus="setTypeMessage" @blur="releaseTypeMessage" placeholder="Type a message here"></textarea>
                            <input type="file" ref="file" style="display: none" v-on:change="onImageChange" class="form-control">                                               
                        </div>                    
                    </div>
                    &nbsp;&nbsp;<b-img src="../images/send-logo.png" @click="sendMessage" class="send-logo" fluid v-b-tooltip.hover title="Send Message"></b-img>
                    &nbsp;&nbsp;<b-img src="../images/attachment-logo.png" @click="$refs.file.click()" class="file-attachment" fluid v-b-tooltip.hover title="File Attachment"></b-img>&nbsp;&nbsp;                   
                </div>
            </b-col>

        </b-row>
    </b-container>
</template>

<script>
export default {
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            contacts: [],
            loginUser: [],
            messages: [],
            contact: [],
            message: '',
            selectedUser: '',
            selectedClaim: '',
            selectedUserType: '',
            selectedLoginUser: '',
            image_path: '../images/',
            loading: false
        };
    },
    sockets:{
        connect:function(){
            console.log('Connected')
        },
        message:function(val){//console.log(jQuery.parseJSON(val)[0]);
            //this.selectedContact(this.selected, jQuery.parseJSON(val)[0]);
            this.saveNewMessage(jQuery.parseJSON(val)[0]);
        },
        typingMessage:function(val) {
            this.setTypingMessage(jQuery.parseJSON(val));
            console.log(val);console.log('sss');
        }
    },
    methods: {
        getUser() {            
            axios.get('/online/hearing/login/contact')            
                .then((response) => {
                    this.loginUser = response.data;
                    localStorage.setItem('selectedLoginUser', this.loginUser[0]['id']);
                    this.selectedLoginUser = localStorage.getItem('selectedLoginUser');
                }
            );
        },
        getContacts() {
            axios.get('/online/hearing/contacts')
                .then((response) => {
                    this.contacts = response.data;
                });
        },
        getpetition() {
            axios.get('/online/hearing/getting_claim')
                .then((response) => {
                    this.contacts_petition = response.data;
                });
        },
        selectedContact(index, contact) {
            this.setUnreadCount(contact, true, true);
            localStorage.setItem('selectedUser', contact.user_id);
            localStorage.setItem('selectedClaim', contact.claim_id);
            localStorage.setItem('selectedUserType', contact.usertype);
            this.selectedUser = localStorage.getItem('selectedUser');
            this.selectedClaim = localStorage.getItem('selectedClaim');
            this.selectedUserType = localStorage.getItem('selectedUserType');
            axios.get(`/online/hearing/conversation/${contact.user_id}/${contact.claim_id}`)
                .then((response) => {
                    this.messages = response.data;
                    this.contact = contact;
                });         
        },
        sendMessage(e) {
            e.preventDefault();
            if (this.message == '') {
                return;
            }
            if(!this.contact) {
                return;
            }//alert(this.message);alert(this.contact.claim_id);alert(this.contact.hearing_number);alert(this.contact.user_id);
            axios.post('/online/hearing/send/message', {
                    claim_id: this.contact.claim_id,
                    hearing_number: this.contact.hearing_number,
                    to_user_id: this.contact.user_id,
                    message_text: this.message                    
                })
                .then((response) => {                
                    this.messages.push();
                })
                .catch((error) => {
                    console.log(error);
                });
                this.message='';                
        },
        saveNewMessage(message) {
            this.setUnreadCount(message, false, false);
            if(!this.contact) {
                return;
            }
            
            if (message.message_type == 'Private') {console.log('private');
                if ((message.claim_id == this.selectedClaim && message.to_user_id == this.selectedLoginUser && this.selectedUserType == 1) || (message.claim_id == this.selectedClaim && message.to_user_id == this.selectedLoginUser && this.selectedUserType == 3) || (message.claim_id == this.selectedClaim && message.from_user_id == this.selectedLoginUser && this.selectedUserType == 1) || (message.claim_id == this.selectedClaim && message.from_user_id == this.selectedLoginUser && this.selectedUserType == 3)) {
                    this.messages.push(message);
                }                
            }
            if (message.message_type == 'Public') {console.log('public');
                //if ((message.claim_id == this.selectedClaim && this.selectedUserType == 2) || (message.claim_id == this.selectedClaim && this.selectedUserType == 4) || (message.claim_id == this.selectedClaim && this.selectedUserType == 3) || (message.claim_id == this.selectedClaim && this.selectedUserType == 1)) {
                    this.messages.push(message);
                //}
            }
        },
        changeUserAccess(contact, event) {
            axios.post('/online/hearing/user/access', {
                id: contact.id,
                user_status: event                    
            })
            .then((response) => {
                console.log(response.status);
            })
            .catch((error) => {
                console.log(error);
            });
        },
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.image = e.target.result;
                this.uploadImage();
            };
            reader.readAsDataURL(file);
            this.fileName = file.name;
            this.fileExtension = file.name.slice((file.name.lastIndexOf(".") - 1 >>> 0) + 2);
        },
        uploadImage() {console.log(this.image);
            if (!this.contact) {
                return;
            }
            axios.post('/online/hearing/send/attachment', {
                    fileName: this.fileName,
                    image: this.image,
                    claim_id: this.contact.claim_id,
                    hearing_number: this.contact.hearing_number,
                    to_user_id: this.contact.user_id,
                    fileExtension: this.fileExtension                    
                })
                .then((response) => { console.log(response);                
                    //this.messages.push();
                    //this.newMessage = response.data[0];console.log(response.data[0].to_user_id);
                    //this.setUnreadCount(response.data[0], false, false);
                })
                .catch((error) => {
                    console.log(error);
                });
            //console.log(this.image);
        },
        newLine() {
            this.message = `${this.message}\n`;
        },
        scrollToBottom() {
            setTimeout(() => {
                this.$refs.messages.scrollTop = this.$refs.messages.scrollHeight - this.$refs.messages.clientHeight;
            }, 50);
        },
        setUnreadCount(contact, type, reset) {
            this.contacts = this.contacts.map((single) => {
                if(single.claim_id == contact.claim_id && single.from_user_id == contact.from_user_id) {
                    if(reset) {
                        single.message_count = 0;
                    } else {
                        single.message_count += 1;
                    }
                    return single;
                }                            
                return single;
            })
        },
        setTypeMessage() {
            if(!this.contact) {
                return;
            }
            this.displayMessageTyping(this.contact, false);
            console.log('message type');
        },
        setTypingMessage(contact) {
            this.contacts = this.contacts.map((single) => {
                if(single.claim_id == contact.claim_id && single.from_user_id == contact.from_user_id) {
                    single.message_typing = contact.display_text;
                    return single;
                    }
                return single;               
            })
        },
        displayMessageTyping(contact, reset) {console.log(reset);
            axios.post('/online/hearing/display/typing/message', {
                    claim_id: contact.claim_id,
                    to_user_id: contact.user_id,
                    display_text: reset                    
                })
                .then((response) => { //console.log(response);                   
                    //this.typingMessage.push();
                    //this.newMessage = response.data[0];console.log(response.data[0].to_user_id);
                    //this.setUnreadCount(response.data[0], false, false);
                })
                .catch((error) => {
                    console.log(error);
                });
                this.typingMessage = '';
        },
        releaseTypeMessage() {
            if(!this.contact) {
                return;
            }
            this.displayMessageTyping(this.contact, true);
        }
    },
    watch: {
        messages(messages) {
            this.scrollToBottom();
        }
    },
    mounted() {
        this.loading = true;
        this.getUser();
        this.getContacts();
        this.getpetition();
        this.contact='';
        this.loading = false;        
    }
    
}
</script>

<style lang="scss" scoped>
    .hearing-b-container {
        padding-left: 11px;
        padding-right: 12px;
    }
    .hearing-b-left-col {
        padding-right: 0px;
        padding-left: 0px;
        background: #bee7f93b;
    }
    .hearing-b-right-col {
        padding-left: 0vh;
        padding-right: 0px;
    }
    .file-icon-size {
        width: 40px;
        border-radius: 0px !important;
    }
    .login-user-icon {
        margin-left: 0vw;
    }
.contact-user{
        width:100%;
        background: #eeeeee;
        border: 1pt solid lightgray;
        height: 9vh;
        color: #000000;
        font-weight: bold;        
    }
    .messages-back{
        height: 80vh;
        // background-image: url(/images/logo1.png);        
        background-color: #e3ddd6;
        background-repeat: no-repeat;
        background-position:center;
        border-left: 1pt solid #dee2e6;
        overflow-y: auto;
    }
    .message-height{
        height: 7vh;
        width: 90%;
    }
    .contact-select-text{
        font-size: 1.5rem;
        padding: 2vh;
        line-height: 9vh;
        font-weight: bold;
    }
    .contact-row-message {
        padding: 0px;
        border: 1px solid #dee2e6;
        height: 11vh;
    }
    .message-component textarea {
        width: 100%;
        resize: none;
        border-radius: 30px;
        border: 2px solid #bee7f9;
        padding: 3px 21px;
        height: 9vh;
        margin-top: 5px;
        margin-left: 3px;
    }
    .message-circle{
    width: 6vh;
}
.receive-message-text-user{
    font-size: .75rem;
    padding-left: 1vh;
    color: #a2a5a9;
    margin-top: -7px;
    padding-bottom: 2px;
}
.receive-message-text{
    background: #cce3f6;
    padding: 1vh;
    margin-left: 1vh;
}
.receive-message-text-align{
    line-height: 4vh;
}
.sent-message-text-user{
    font-size: .75rem;
    padding-right: 1vh;
    color: #a2a5a9;
    float: right;
}
.sent-message-text{
    background: #bceaff;
    padding: 1vh;
    margin-right: 1vh;
    color: #000000;
    font-size: 1.2em;
}
.sent-message-text-align{
    text-align: right;
    line-height: 4vh;
}
.unread-message-count {
    position: absolute;
    margin-top: 4vh;
    margin-left: 4vw;
    background-color: #38c172;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    font-size: 0.5rem;
    font-weight: bold;
    z-index: 11111;
    text-align: center;
}
.typing-message {
    position: absolute;
    margin-top: 23px;
    margin-left: 12px;
    text-align: right;
    width: 72%;
    font-size: .8rem;
    font-weight: 900;
    color: black;
    animation: blinker 1s linear infinite;
}
@keyframes blinker {
  50% {
    opacity: 0;
  }
}
.attachment {
    width: 100%;
    padding-right: 10px;
    margin-top: 9px;
}
.send-logo {
    width: 50px;
    height: 50px;
    margin-top: 6px;  
}
.file-attachment {
    width: 50px;
    height: 50px;
    margin-top: 6px;
}
::-webkit-scrollbar {
  width: 10px;
}
::-webkit-scrollbar-button {
  background: #ffffff;
  height: 0px;
}
::-webkit-scrollbar-track-piece {
  background: #dddfeb;
}
::-webkit-scrollbar-thumb {
  background: #ffdc13;
}
</style>