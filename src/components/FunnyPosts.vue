<template>
  <div v-if="currentNode" id="FunnyPosts">
    <div id="modal">
      <mdb-modal :show="push" @close="push = false">
        <div class="mt-3">
          <h4>Share</h4>
        </div>
        <mdb-modal-body class="mod-body">
          <facebook :url="url" scale="3" class="mr-4"></facebook>
          <twitter
            :url="url"
            title="Check me on Github"
            scale="3"
            class="mr-4"
          ></twitter>
          <linkedin :url="url" scale="3" class="mr-4"></linkedin>
          <telegram :url="url" scale="3" class="mr-4"></telegram>
          <whats-app
            :url="url"
            title="Hello"
            scale="3"
            class="mr-4"
          ></whats-app>
          <email :url="url" subject="Hello" scale="3" class="mr-4"></email>
        </mdb-modal-body>
        <mdb-modal-footer class="mx-auto">
          <mdb-btn
            class="modal-btn"
            gradient="blue"
            rounded
            @click="push = false"
            >Close</mdb-btn
          >
        </mdb-modal-footer>
      </mdb-modal>
    </div>

    <div class="container d-flex justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-10 col-sm-10 col-xs-12">
        <b-card
          :class="{ card: true, 'dark-card': darkMode }"
          img-alt="Card image"
          img-top>
          <b-card-header class="card-header">
            <label
              >{{ currentNode.node.owner.username }}</label
            >

            <ejs-dropdownbutton
              :items="items"
              iconCss="e-icons e-settings"
              cssClass="e-caret-hide"
              id="ejs-btn"
            ></ejs-dropdownbutton>
          </b-card-header>
          <div class="header-settings"></div>

          <hr class="mb-1 mt-0" />
          <b-card-img :src="currentNode.node.display_url"></b-card-img>
          <b-card-body>
            <hr class="mb-1 mt-0" />
            <div class="d-flex justify-content-around">
              <button class="btn btn-primary" href="#">
                <font-awesome-icon icon="heart" />
              </button>
              <button class="btn btn-primary" href="#" @click="push = true">
                <font-awesome-icon icon="share" />
              </button>
              <button class="btn btn-primary" @click="downloadImage()">
                <font-awesome-icon icon="download" />
              </button>
            </div>
          </b-card-body>
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
  Email,
} from "vue-socialmedia-share";
import {
  mdbContainer,
  mdbModal,
  mdbBtn,
  mdbModalBody,
  mdbModalFooter,
} from "mdbvue";
import axios from "axios";
export default {
  data() {
    return {
      currentPage: 0,
      maxPerPage: 2,
      totalResults: 100,
      showLoader: true,
      items: [
        {
          text: "Report",
        },
      ],
      push: false,
      url: this.currentNode.node.display_url,
    };
  },
  computed: {
    pageCount() {
      return Math.ceil(this.totalResults / this.maxPerPage);
    },
    pageOffset() {
      return this.maxPerPage * this.currentPage;
    },
    darkMode() {
      return this.$store.getters.get_mode;
    },
  },
  methods: {
    // Download Image Method
    downloadImage() {
      axios({
        url: this.currentNode.node.display_url,
        method: "GET",
        responseType: "blob",
      }).then((response) => {
        var fileUrl = window.URL.createObjectURL(new Blob([response.data]));
        var fileLink = document.createElement("a");
        fileLink.href = fileUrl;

        fileLink.setAttribute("download", "image.jpg");
        document.body.appendChild(fileLink);

        fileLink.click();
      });
    },
  },
  props: {
    currentNode: Object,
    user: Object,
    next: Function,

    // posts: Array
  },
  name: "FunnyPosts",
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
    Email,
  },
};
</script>
<style>
.e-settings::before {
  content: "\e984";
}
</style>
<style scoped>
.mod-body {
  cursor: pointer;
}
.modal-btn {
  width: 100px !important;
  height: 40px !important;
}
.card {

  border-radius: 20px;
  box-shadow: 0px 0px 15px rgb(99, 97, 97) !important;
}
.dark-card {
  color:white;
  background: rgb(0, 0, 0);
  background: linear-gradient(
    180deg,
    rgba(0, 0, 0, 1) 0%,
    rgba(121, 121, 121, 1) 100%
  );

}
.dark-card .card-header{
    color:white !important;
}
.dark-card #ejs-btn:focus,
.dark-card #ejs-btn:hover{
  color:white !important;
}
.card-body {
  padding: 6px 6px 6px;
}
.card-img {
  border-radius: 20px;
  margin: 0;
}
.card-text {
  text-align: left;
  padding-top: 2vh;
  margin-bottom: 2vh;
}
.card-header {
  width: 100%;
  border: 0;
  background-color: transparent;
  border-radius: 15px 15px 0 0 !important;
  text-align: center;
  padding: auto;
  display: inline-block;
  font-size: 110%;
  color: black;
}

.card-header button {
  top: 0;
  right: 0;
  float: right;
}

.btn,
.btn.focus,
.btn:focus,
.btn:hover {
  outline: 0;
  box-shadow: none !important;
  width: 10vw;
}
@media (max-width: 390px) {
  .btn {
    padding: 0;
  }
}
.header-settings {
  display: inline-block;
  cursor: pointer;
}
.e-btn,
.e-btn:hover,
.e-btn:focus {
  background: transparent;
}

#dropdown-1 {
  float: right;
}
</style>
