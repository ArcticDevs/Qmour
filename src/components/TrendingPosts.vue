<template>
  <div>
    <!-- <b-card-group deck >
      <h5>Username</h5> -->
      <b-card v-for="post in posts" :key="post" class="card" img-alt="Card image" img-top>
        <b-card-header class="card-header">Username</b-card-header>
        <b-card-img :src=post.image></b-card-img>
          <b-card-text class="card-img">{{ post.bottomText }}</b-card-text>
        <div class="d-flex justify-content-around">
          <b-button href="#">Like</b-button>
          <b-button href="#">Share</b-button>
          <b-button href="#">Download</b-button>
        </div>
      </b-card>
    <!-- </b-card-group> -->
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
.card{
  margin:25px 25px;
  border-radius: 20px;
}
.card-img{
  border-radius:15px;
}
.card-header{
  border:0;
  background-color:white;
  border-radius:15px 15px 0 0 !important;
}

</style>
