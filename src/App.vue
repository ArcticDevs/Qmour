<template>
  <div id="app" class="container">
    <div class="heading">
      <h1 class="mt-3">Qmour</h1>
    </div>
    <div class="header-settings">
      <ejs-dropdownbutton :items="items" iconCss="e-icons e-menu" cssClass="e-caret-hide"></ejs-dropdownbutton>
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
  </div>
</template>

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
  background-color: #b6b6b6;
  border: 0px;
  border-radius: 9px;
  font-family: "Red Hat Display";
  font-style: normal;
  font-weight: bold;
}
#nav a.router-link-exact-active button {
  border: 0px;
  background-color: #6271ff;
  /* background: linear-gradient(267deg, #aaac29, #7f8be4, #ee6407);
    background-size: 600% 600%;
    -webkit-animation: btnAnimantion 3s ease infinite;
    -moz-animation: btnAnimantion 3s ease infinite;
    -o-animation: btnAnimantion 3s ease infinite;
    animation: btnAnimantion 3s ease infinite; */
}
/* @-webkit-keyframes btnAnimantion {
    0%{background-position:0% 51%}
    50%{background-position:100% 50%}
    100%{background-position:0% 51%}
}
@-moz-keyframes btnAnimantion {
    0%{background-position:0% 51%}
    50%{background-position:100% 50%}
    100%{background-position:0% 51%}
}
@-o-keyframes btnAnimantion {
    0%{background-position:0% 51%}
    50%{background-position:100% 50%}
    100%{background-position:0% 51%}
}
@keyframes btnAnimantion {
    0%{background-position:0% 51%}
    50%{background-position:100% 50%}
    100%{background-position:0% 51%}
} */
</style>
<style scoped>
.heading {
  width: 80%;
  position: relative;
  display: inline-block;
}
.header-settings {
  display: inline-block;
  max-width: 20px;
  cursor: pointer;
}
.navlink {
  margin-right: 9px;
}
@media (min-width: 492px) {
  #nav button {
    margin-right: 25px;
  }
}
@media (max-width: 445px) {
  #nav {
    padding: 10px 0px;
  }
  .navlink {
    font-size: 12px;
    padding: 5px 10px;
  }
}
@media (max-width: 310px) {
  #nav button {
    margin: auto;
    display: block;
  }
}
</style>
<script>
export default {
  data () {
    return {
      items: [
        {
          text: 'Upload'
        }
      ]
    }
  }
}
</script>
<style>
  @import '../node_modules/@syncfusion/ej2-base/styles/material.css';
  @import '../node_modules/@syncfusion/ej2-buttons/styles/material.css';
  @import '../node_modules/@syncfusion/ej2-popups/styles/material.css';
  @import '../node_modules/@syncfusion/ej2-splitbuttons/styles/material.css';
  .e-menu::before {
    content: '\e984';
  }
</style>
