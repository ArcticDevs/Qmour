<template>

<!-- <div class="container"> -->
  <div class="container d-flex justify-content-center">
    <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-12">
    <TrendingPosts class="trending-posts"
    :posts="TrendingPosts"
     />
    </div>
<!-- </div> -->
</div>

</template>

<script>
import { mapState } from 'vuex'
import TrendingPosts from '../components/TrendingPosts.vue'
export default {
  name: 'Trending',
  components: {
    TrendingPosts
  },
  computed: {
    ...mapState([
      'TrendingPosts'
    ])
  }
}
</script>
