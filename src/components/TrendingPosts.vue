<template>
  <div>
        <b-card v-for="post in posts" :key="post.ID" class="card" img-alt="Card image" img-top>
          <b-card-header class="card-header">Username</b-card-header>
          <hr class="mb-1 mt-0">
          <b-card-img :src="post.image"></b-card-img>
          <!-- <hr class="mt-1"> -->
          <b-card-body>
          <b-card-text>{{ post.bottomText }}</b-card-text>
          <hr class="mb-1 mt-0">
          <div class="d-flex justify-content-around">
            <button class="btn btn-primary" href="#"><font-awesome-icon icon="heart" /></button>
            <button class="btn btn-primary" href="#"><font-awesome-icon icon="share" /></button>
            <button class="btn btn-primary" href="#"><font-awesome-icon icon="download" /></button>
          </div>
          <!-- <hr class="mb-1 mt-0"> -->
          </b-card-body>
          <!-- <mdb-card-footer class="text-muted mt-4">2 days ago</mdb-card-footer> -->
        </b-card>
  </div>
</template>

<script>
export default {
  props: {
    posts: Array
  }
}
</script>

<style scoped>
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
