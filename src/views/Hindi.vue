<template>
  <div v-if="api_details">
    <section v-for="(node,index) in pageOffset" :key="index">
      <div v-if="api_details[index]">
        <Posts
          :key="index"
          :currentNode="api_details[index]"
          :user="user"
          :next="next"
          :category="category"
        />
      </div>
    </section>

    <footer>
      <div ref="infiniteScrollTrigger" id="scroll-trigger"></div>
      <div class="circle-loader" v-if="showLoader"></div>
    </footer>
  </div>
</template>

<script>
import { mapState } from "vuex";
import Posts from "../components/Posts.vue";
export default {
 
  data() {
    return {
      currentPage:0,
      maxPerPage:7,
      totalResults:100,
      showLoader:true,
      api_details: [],
      currentNode: {},
      user: {},
      index: 0,
      category: "Hindi",
      accounts:["katega_bhai", "aur_bataaoo", "dearsanskar", "shinchan_baccha", "tom.and.jerry_meme", "being_sanskaarii", "90s.days", "__.cartoon.___", "prancho_stuff"]
         };
  },
  computed: {
    pageCount(){
      return Math.ceil(this.totalResults/this.maxPerPage);
    },
    pageOffset(){
      return this.maxPerPage * this.currentPage;
    }
  },
  components: {
    Posts,
  },
  methods: {
    next() {
      this.index++;
    },
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
    // Infinite Scroll Method
    scrollTrigger() {
      const observer= new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if(entry.intersectionRatio > 0 && this.currentPage < this.pageCount){
            this.showLoader = true;
            setTimeout(()=>{
              this.currentPage += 1;
              this.showLoader = false;
            }, 1000);
          }
        });
      });
      observer.observe(this.$refs.infiniteScrollTrigger);
    }
  },
  mounted: function () {
    this.accounts.forEach((element) => {
      fetch("https://www.instagram.com/" + element + "/?__a=1", {
        methods: "get",
      })
        .then((response) => {
          return response.json();
        })
        .then((jsonData) => {

          jsonData.graphql.user.edge_owner_to_timeline_media.edges.forEach(
            (element) => {
              this.api_details.push(element);
            }
          );
        })
        .catch((err) => {
          // Do something for an error here
          console.log("Error Reading data " + err);
        });
    });

// scroll tirigger for infinite load
    this.scrollTrigger();

  },
};
</script>

<style scoped>
.mod-body {
  cursor: pointer;
}
.modal-btn {
  width: 100px !important;
  height: 40px !important;
}
.card {
  margin: 25px 25px;
  border-radius: 20px;
  box-shadow: 0px 0px 15px rgb(99, 97, 97) !important;
}
.card-body {
  padding-top: 6px;
  padding-bottom: 0;
}
.card-img {
  border-radius: 20px;
}
.card-text {
  text-align: left;
  padding-top: 2vh;
  margin-bottom: 2vh;
}
.card-header {
  border: 0;
  background-color: white;
  border-radius: 15px 15px 0 0 !important;
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
footer{
  position:relative;
  width:100%;
  height:80px;
}
footer #scroll-trigger{
  height: 40px;
}
.circle-loader{
  position: absolute;
  top:50%;
  left:50%;
  transform: translate(-50%,-50%);
  width:50px;
  height:50px;
  border-radius: 50%;
  border: 5px solid rgba(22, 22, 22, 0.2);
  border-top:5px solid #fff;
  animation:animate 1.5s infinite linear;
}
@keyframes animate{
  0%{
    transform: translate(-50%, -50%) rotate(0deg);
  }
  100%{
    transform: translate(-50%, -50%) rotate(360deg);
  }
}
</style>
