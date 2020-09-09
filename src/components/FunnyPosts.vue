<template>
<div>
  <div id="modal">
    <mdb-container>
    <!-- cart modal -->
    <mdb-modal :show="push" @close="push = false">
      <div class="mt-3">
        <h4>Share</h4>
      </div>
      <mdb-modal-body class="mod-body">
    <facebook :url="url" scale="3" class="mr-4"></facebook>
    <twitter :url="url" title="Check me on Github" scale="3" class="mr-4"></twitter>
    <linkedin :url="url" scale="3" class="mr-4"></linkedin>
    <telegram :url="url" scale="3" class="mr-4"></telegram>
    <whats-app :url="url" title="Hello" scale="3" class="mr-4"></whats-app>
    <email :url="url" subject="Hello" scale="3" class="mr-4"></email>      </mdb-modal-body>
      <mdb-modal-footer class="mx-auto">
        <mdb-btn class="modal-btn" gradient="blue" rounded @click="push = false">Close</mdb-btn>
      </mdb-modal-footer>
    </mdb-modal>
  </mdb-container>
  </div>
    <div class="container d-flex justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-10 col-sm-10 col-xs-12">

        <b-card class="card" img-alt="Card image" img-top>
          <!-- <div class="row">
        <div class="col-4"> -->
            <!-- <template v-slot:abc>{{currentNode.node.display_url}}</template> -->
            <b-img left :src="user.profile_pic_url_hd" alt="Profile" style="height:45px ;border-radius:50px"></b-img>
        <!-- </div>
        <div class="col-8"> -->
          <b-card-header class="card-header"><label>{{ currentNode.node.owner.username }}</label></b-card-header>
<div class="header-settings">
      <!-- <ejs-dropdownbutton :items="items" iconCss="e-icons e-M_Properties" style=".e-M_Properties::before{content:'\e679';}" class="upload-icon"></ejs-dropdownbutton> -->
    </div>
        <!-- </div>
        </div> -->
          <hr class="mb-1 mt-0">
          <b-card-img :src="currentNode.node.display_url"></b-card-img>
          <!-- <hr class="mt-1"> -->
          <b-card-body>
              <!-- <template v-slot:lead>{{  }}</template> -->
          <!-- <b-card-text>{{  }}</b-card-text> -->
          <hr class="mb-1 mt-0">
          <div class="d-flex justify-content-around">
            <button class="btn btn-primary" href="#"><font-awesome-icon icon="heart" /></button>
            <button class="btn btn-primary" href="#" @click="push = true"><font-awesome-icon icon="share" /></button>
            <button class="btn btn-primary" @click="downloadImage()"><font-awesome-icon icon="download" /></button>
          </div>
          <!-- <hr class="mb-1 mt-0"> -->
          </b-card-body>
          <!-- <mdb-card-footer class="text-muted mt-4">2 days ago</mdb-card-footer> -->
        </b-card>
    </div>
    </div>
  </div>
</template>
<script>
import {
  Facebook,
  Twitter,
  Linkedin,
  Telegram,
  WhatsApp,
  Email
} from 'vue-socialmedia-share'
import { mdbContainer, mdbModal, mdbBtn, mdbModalBody, mdbModalFooter } from 'mdbvue'
import axios from 'axios'
export default {
  data () {
    return {
      items: [
        {
          text: 'Report'
        }
      ],
      push: false,
      url: this.currentNode.node.display_url
    }
  },
  props: {
    currentNode: Object,
    user: Object,
    next: Function
    // posts: Array
  },
  name: 'modal',
  components: {
    mdbContainer,
    mdbModal,
    mdbBtn,
    mdbModalBody,
    mdbModalFooter,
    Facebook,
    Twitter,
    Linkedin,
    Telegram,
    WhatsApp,
    Email
  },
  methods: {
    downloadImage () {
      axios({
        url: this.currentNode.node.display_url,
        method: 'GET',
        responseType: 'blob'
      }).then((response) => {
        var fileUrl = window.URL.createObjectURL(new Blob([response.data]))
        var fileLink = document.createElement('a')
        fileLink.href = fileUrl

        fileLink.setAttribute('download', 'image.jpg')
        document.body.appendChild(fileLink)

        fileLink.click()
      })
    }
  }
}
</script>
<style>
  /* @import '../node_modules/@syncfusion/ej2-base/styles/material.css';
  @import '../node_modules/@syncfusion/ej2-buttons/styles/material.css';
  @import '../node_modules/@syncfusion/ej2-popups/styles/material.css';
  @import '../node_modules/@syncfusion/ej2-splitbuttons/styles/material.css';
  .e-menu::before {
    content: '\e984';
  } */
</style>
<style scoped>
.mod-body{
  cursor:pointer;
}
.modal-btn{
  width:100px !important;
  height:40px !important;
}
.card {
  margin: 25px 0px;
  border-radius: 20px;
  box-shadow:0px 0px 15px rgb(99, 97, 97) !important;
}
.card-body{
  padding-top:6px;
  padding-bottom:0;
}
.card-img{
  border-radius: 20px;
}
.card-text{
  text-align:left;
  padding-top:2vh;
  margin-bottom: 2vh;
}
.card-header {
  border: 0;
  background-color: white;
  border-radius: 15px 15px 0 0 !important;
  text-align: justify;
  margin-left: 30px;
  width:70%;
  display:inline-block;
}
.btn,
.btn.focus,
.btn:focus,
.btn:hover {
  outline: 0;
  box-shadow: none !important;
  width:10vw;
  /* padding:0; */
  /* height:30px; */
/* padding:0 10px; */
}
@media (max-width:390px){
  .btn{
    padding:0;
  }
}
.header-settings {
  display: inline-block;
  cursor: pointer;
}
  .e-btn, .e-btn:hover, .e-btn:focus{
  background:transparent;
}

</style>
