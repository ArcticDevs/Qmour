<template>

<!-- <div class="container"> -->
  <!-- <div class="container d-flex justify-content-center">
    <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-12"> -->
<div v-if="api_details">
    <FunnyPosts
    :posts="DankPosts"
    v-for="(node, index) in api_details" :key="index"
    :currentNode="api_details[index]"
    :user="user"
    :next="next"
     />
  <!-- </div>
    </div> -->
<!-- </div> -->
</div>

</template>

<script>
// import { mdbContainer, mdbModal, mdbBtn, mdbModalBody, mdbModalFooter } from 'mdbvue'
// import { mapState } from 'vuex'
import FunnyPosts from '../components/FunnyPosts.vue'
export default {
  data () {
    return {
      push: false,
      url: 'https://dhananjaysoni.github.io',
      api_details: [],
      user: {},
      index: 0,
      accounts: ['avengers','9gag', 'viralindiaofficial']
    }
  },
  components: {
    FunnyPosts
  // },
  // computed: {
  //   ...mapState([
  //     'TrendingPosts'
  //   ])
  },
  methods: {
    next () {
      this.index++
    }
  },
  mounted: function () {
    this.accounts.forEach(element => {
      fetch('https://www.instagram.com/'+element+'/?__a=1', {
      methods: 'get'
    })
      .then(response => {
        return response.json()
      })
      .then((jsonData) => {
        jsonData.graphql.user.edge_owner_to_timeline_media.edges.forEach(element => {
          this.api_details.push(element);
        });
      })
    });
  }
}
</script>

<style scoped>
.mod-body{
  cursor:pointer;
}
.modal-btn{
  width:100px !important;
  height:40px !important;
}
.card {
  margin: 25px 25px;
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
</style>
