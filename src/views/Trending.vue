<template>
  <div>
    <TrendingPosts class="trending-posts"
    :posts="TrendingPosts"
     />
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
  data () {
    return {}
  },
  computed: {
    ...mapState([
      'TrendingPosts'
    ])
  }
}
</script>
<style>
.trending-posts{
  width:350px;
  height:100px;
  display:inline-block;
}
</style>
