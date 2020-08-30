<template>
  <div id="app">
    <div>
      <h1 class="mt-3">Qmour</h1>
    </div>
    <div id="nav">
      <router-link to="/"><button class="btn btn-primary mb-2 navlink">Trending</button></router-link>
      <router-link to="/dank-memes"><button class="btn btn-primary mb-2 navlink">Dank Memes</button></router-link>
      <router-link to="/funny-memes"><button class="btn btn-primary mb-2 navlink">Funny Memes</button></router-link>
    </div>
    <router-view/>
  </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap');
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

#nav button{
  background-color:#B6B6B6;
  border:0px;
  border-radius: 9px;
  font-family: 'Red Hat Display';
  font-style: normal;
  font-weight: bold;
}

#nav a.router-link-exact-active button {
  background-color: #6271FF;
}

</style>
<style scoped>
.navlink{
margin-right:9px;
}

@media(min-width:471px){

#nav button{
margin-right:25px;
}
}

@media (max-width:421px){
#nav{
  padding:10px 10px;
}
.navlink{
  font-size:12px;
}
}

@media(max-width:310px){
#nav button{
  margin:auto;
  display:block;
}
}

</style>
