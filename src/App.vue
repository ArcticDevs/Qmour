<template>

  <div id="app">
    <div class="heading">
      <h1 class="mt-3">Qmour</h1>
    </div>
    <div class="header-settings">
      <ejs-dropdownbutton :items="items" iconCss="e-icons e-menu" cssClass="e-caret-hide" class="upload-icon"></ejs-dropdownbutton>
    </div>
    <div id="nav">
      <router-link to="/">
        <button class="btn btn-primary mb-2 navlink">Trending</button>
      </router-link>
      <router-link to="/dank-memes">
        <button class="btn btn-primary mb-2 navlink">Dank Memes</button>
      </router-link>
      <router-link to="/funny-memes">
        <button class="btn btn-primary mb-2 navlink">Funny Memes</button>
      </router-link>
    </div>
    <router-view />
<!-- <div v-if="api_details.length"> -->
  <TrendingPosts


  />
<!-- </div> -->
  </div>

</template>

<script>
import TrendingPosts from './components/TrendingPosts.vue'
export default {
  components: {
    TrendingPosts
  },
  data () {
    return {
      items: [
        {
          text: 'Upload'
        }
      ],
      
    }
  },
  

}// this.user = {...jsonData.graphql.user}
// console.log(this.api_details)
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap");
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#nav {
  padding: 10px 30px;
}
#nav a {
  font-weight: bold;
  color: #fff;
}
#nav button {
  background-color: #b6b6b6 !important;
  border: 0px;
  border-radius: 9px;
  font-family: "Red Hat Display";
  font-style: normal;
  font-weight: bold;
}
#nav a.router-link-exact-active button {
  border: 0px;
  background-color: #6271ff !important;
}

  @import '../node_modules/@syncfusion/ej2-base/styles/material.css';
  @import '../node_modules/@syncfusion/ej2-buttons/styles/material.css';
  @import '../node_modules/@syncfusion/ej2-popups/styles/material.css';
  @import '../node_modules/@syncfusion/ej2-splitbuttons/styles/material.css';
  .e-menu::before {
    content: '\e984';
  }
</style>

<style scoped>
.upload-icon{
  display:fixed;
}
.btn.focus,
.btn:focus,
.btn:hover {
  outline: 0;
  box-shadow: none !important;
}
.e-btn, .e-btn:hover, .e-btn:focus{
  background:transparent;
}

#nav button {
  background-color: #b6b6b6;
  }
.heading {
  width: 80%;
  position: relative;
  display: inline-block;
}
.header-settings {
  display: inline-block;
  cursor: pointer;
}
.navlink {
  margin-right: 8px;
}
@media (min-width: 492px) {
  #nav button {
    margin-right: 25px;
  }
}
@media (max-width: 359px){
  .navlink{
    font-size:10px !important;
    margin-right:5px;
  }
  #nav{
    margin-left:10px;
  }
}
@media (max-width: 768px) {
  #nav {
    padding: 10px 0px;
  }
  .navlink {
    font-size: 12px;
    padding: 5px 10px;
  }
}
@media (max-width: 318px) {
  #nav button {
    margin: auto;
    display: block;
  }
}
</style>
