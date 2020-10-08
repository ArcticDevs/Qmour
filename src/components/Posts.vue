<template>
  <div v-if="currentNode" id="Indian">
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
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
      <div class="col-xl-6 col-lg-6 col-md-7 col-sm-10 col-xs-12">
        <b-card
          :class="{ card: true, 'dark-card': darkMode }"
          img-alt="Card image"
          img-top
        >
          <b-card-header class="card-header">
            <label>{{ currentNode.node.owner.username }}</label>

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
              <div class="wrapper">
                <a
                  href="javascript:void(0);"
                  class="share-button"
                  @click="push = true"
                >
                  <i class="material-icons">share</i>
                  <span class="share-overlay"></span>
                </a>
              </div>

              <div class="container">
                <a href="" class="button dark-single" @click="downloadImage()">
                  <div>
                    <svg viewBox="0 0 24 24"></svg>
                  </div>
                </a>
              </div>

              <div class="wrapper">
                <a href="javascript:void(0);" class="like-button">
                  <i class="material-icons not-liked bouncy">favorite_border</i>
                  <i class="material-icons is-liked bouncy">favorite</i>
                  <span class="like-overlay"></span>
                </a>
              </div>
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
  mounted() {
    $(".like-button").click(function () {
      $(this).toggleClass("is-active");
    });

    document.querySelectorAll(".button").forEach((button) => {
      let duration = 1000,
        svg = button.querySelector("svg"),
        svgPath = new Proxy(
          {
            y: null,
            smoothing: null,
          },
          {
            set(target, key, value) {
              target[key] = value;
              if (target.y !== null && target.smoothing !== null) {
                svg.innerHTML = getPath(target.y, target.smoothing, null);
              }
              return true;
            },
            get(target, key) {
              return target[key];
            },
          }
        );

      button.style.setProperty("--duration", duration);

      svgPath.y = 20;
      svgPath.smoothing = 0;

      button.addEventListener("click", (e) => {
        e.preventDefault();

        if (!button.classList.contains("loading")) {
          button.classList.add("loading");

          gsap.to(svgPath, {
            smoothing: 0.3,
            duration: (duration * 0.065) / 1000,
          });

          gsap.to(svgPath, {
            y: 12,
            duration: (duration * 0.265) / 1000,
            delay: (duration * 0.065) / 1000,
            ease: Elastic.easeOut.config(1.12, 0.4),
          });

          setTimeout(() => {
            svg.innerHTML = getPath(0, 0, [
              [3, 14],
              [8, 19],
              [21, 6],
            ]);
          }, duration / 2);
        }
      });
    });

    function getPoint(point, i, a, smoothing) {
      let cp = (current, previous, next, reverse) => {
          let p = previous || current,
            n = next || current,
            o = {
              length: Math.sqrt(
                Math.pow(n[0] - p[0], 2) + Math.pow(n[1] - p[1], 2)
              ),
              angle: Math.atan2(n[1] - p[1], n[0] - p[0]),
            },
            angle = o.angle + (reverse ? Math.PI : 0),
            length = o.length * smoothing;
          return [
            current[0] + Math.cos(angle) * length,
            current[1] + Math.sin(angle) * length,
          ];
        },
        cps = cp(a[i - 1], a[i - 2], point, false),
        cpe = cp(point, a[i - 1], a[i + 1], true);
      return `C ${cps[0]},${cps[1]} ${cpe[0]},${cpe[1]} ${point[0]},${point[1]}`;
    }

    function getPath(update, smoothing, pointsNew) {
      let points = pointsNew
          ? pointsNew
          : [
              [4, 12],
              [12, update],
              [20, 12],
            ],
        d = points.reduce(
          (acc, point, i, a) =>
            i === 0
              ? `M ${point[0]},${point[1]}`
              : `${acc} ${getPoint(point, i, a, smoothing)}`,
          ""
        );
      return `<path d="${d}" />`;
    }
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
    track() {
      this.$ga.page("/Indian");
    },
  },
  props: {
    currentNode: Object,
    user: Object,
    next: Function,
  },
  name: "Indian",
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
/* ********************Menu icon*************** */
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
  padding: 0 16px 0px;
  border-radius: 20px;
  box-shadow: 0px 0px 10px rgb(99, 97, 97) !important;
}
.dark-card {
  color: white;
  background: rgba(45, 45, 45, 0.94);
}
.dark-card .card-header {
  color: white;
}
.dark-card #ejs-btn,
.dark-card #ejs-btn:focus,
.dark-card #ejs-btn:hover {
  color: white !important;
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
  text-align: left;
  padding: auto;
  display: inline-block;
  font-size: 110%;
  font-weight: 700;
  color: black;
}

@media (max-width: 500px) {
  .card-header {
    padding: 10px 0 5px;
  }
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
#Indian {
  margin-bottom: 5vh;
}

/* **************Like Button************** */
.wrapper .like-button {
  position: relative;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #ccc;
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  align-items: center;
  margin: 0 auto;
  text-decoration: none;
  overflow: hidden;
}
@media (max-width:450px){
  .wrapper .like-button{
    width: 40px;
    height: 40px;
  }
}
.wrapper .share-button {
  position: relative;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #ccc;
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  align-items: center;
  margin: 0 auto;
  text-decoration: none;
  overflow: hidden;
}
@media (max-width:450px){
  .wrapper .share-button{
    width: 40px;
    height: 40px;
  }
}
.wrapper .like-button .like-overlay {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #ff4f8f;
  -webkit-transform: scale(0);
  transform: scale(0);
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
  z-index: 0;
}
.wrapper .share-button .share-overlay {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #ff4f8f;
  -webkit-transform: scale(0);
  transform: scale(0);
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
  z-index: 0;
}
.wrapper .like-button i.not-liked {
  display: block;
  color: #fff;
  position: relative;
  z-index: 1;
}
.wrapper .like-button i.is-liked {
  display: none;
  color: #fff;
  position: relative;
  z-index: 1;
}
.wrapper .like-button.is-active .like-overlay {
  -webkit-transform: scale(1);
  transform: scale(1);
}
.wrapper .like-button.is-active i.not-liked {
  display: none;
}
.wrapper .like-button.is-active i.is-liked {
  display: block;
}

@-webkit-keyframes bouncy {
  from,
  to {
    -webkit-transform: scale(1, 1);
  }
  25% {
    -webkit-transform: scale(0.9, 1.1);
  }
  50% {
    -webkit-transform: scale(1.1, 0.9);
  }
  75% {
    -webkit-transform: scale(0.95, 1.05);
  }
}
@keyframes bouncy {
  from,
  to {
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1);
  }
  25% {
    -webkit-transform: scale(0.9, 1.1);
    transform: scale(0.9, 1.1);
  }
  50% {
    -webkit-transform: scale(1.1, 0.9);
    transform: scale(1.1, 0.9);
  }
  75% {
    -webkit-transform: scale(0.95, 1.05);
    transform: scale(0.95, 1.05);
  }
}
.bouncy {
  -webkit-animation: bouncy 0.6s;
  animation: bouncy 0.6s;
  -webkit-animation-duration: 0.6s;
  animation-duration: 0.6s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

/* **********************Download Button**************** */
.button.dark-single {
  --background: none;
  --rectangle: #cccccc;
  --success: #4bc793;
}

.button {
  --background: #275efe;
  --rectangle: #184fee;
  --success: #4672f1;
  --text: rgb(0, 0, 0);
  --arrow: #fff;
  --checkmark: #fff;
  --shadow: rgba(10, 22, 50, 0.24);
  display: -webkit-box;
  display: flex;
  overflow: hidden;
  text-decoration: none;
  -webkit-mask-image: -webkit-radial-gradient(white, black);
  background: var(--background);
  border-radius: 50%;
  box-shadow: 0 2px 8px -1px var(--shadow);
  -webkit-transition: box-shadow 0.2s ease, -webkit-transform 0.2s ease;
  transition: box-shadow 0.2s ease, -webkit-transform 0.2s ease;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  transition: transform 0.2s ease, box-shadow 0.2s ease,
    -webkit-transform 0.2s ease;
}
.button:active {
  -webkit-transform: scale(0.95);
  transform: scale(0.95);
  box-shadow: 0 1px 4px -1px var(--shadow);
}
.button > div {
  position: relative;
  width: 50px;
  height: 50px;
  background: var(--rectangle);
}
@media (max-width:450px){
  .button > div{
    width: 40px;
    height: 40px;
  }
}
.button > div:before,
.button > div:after {
  content: "";
  display: block;
  position: absolute;
}
.button > div:before {
  border-radius: 1px;
  width: 2px;
  top: 50%;
  left: 50%;
  height: 17px;
  margin: -9px 0 0 -1px;
  background: var(--arrow);
}
.button > div:after {
  width: 60px;
  height: 60px;
  -webkit-transform-origin: 50% 0;
  transform-origin: 50% 0;
  border-radius: 0 0 80% 80%;
  background: var(--success);
  top: 0;
  left: 0;
  -webkit-transform: scaleY(0);
  transform: scaleY(0);
}
.button > div svg {
  display: block;
  position: absolute;
  width: 20px;
  height: 20px;
  left: 50%;
  top: 50%;
  margin: -9px 0 0 -10px;
  fill: none;
  z-index: 1;
  stroke-width: 2px;
  stroke: var(--arrow);
  stroke-linecap: round;
  stroke-linejoin: round;
}

.button.loading > div:before {
  -webkit-animation: line calc(var(--duration) * 1ms) linear forwards
    calc(var(--duration) * 0.065ms);
  animation: line calc(var(--duration) * 1ms) linear forwards
    calc(var(--duration) * 0.065ms);
}
.button.loading > div:after {
  -webkit-animation: background calc(var(--duration) * 1ms) linear forwards
    calc(var(--duration) * 0.065ms);
  animation: background calc(var(--duration) * 1ms) linear forwards
    calc(var(--duration) * 0.065ms);
}
.button.loading > div svg {
  -webkit-animation: svg calc(var(--duration) * 1ms) linear forwards
    calc(var(--duration) * 0.065ms);
  animation: svg calc(var(--duration) * 1ms) linear forwards
    calc(var(--duration) * 0.065ms);
}

@-webkit-keyframes text {
  10%,
  85% {
    -webkit-transform: translateY(-100%);
    transform: translateY(-100%);
  }
  95%,
  100% {
    -webkit-transform: translateY(-200%);
    transform: translateY(-200%);
  }
}

@keyframes text {
  10%,
  85% {
    -webkit-transform: translateY(-100%);
    transform: translateY(-100%);
  }
  95%,
  100% {
    -webkit-transform: translateY(-200%);
    transform: translateY(-200%);
  }
}
@-webkit-keyframes line {
  5%,
  10% {
    -webkit-transform: translateY(-30px);
    transform: translateY(-30px);
  }
  40% {
    -webkit-transform: translateY(-20px);
    transform: translateY(-20px);
  }
  65% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  75%,
  100% {
    -webkit-transform: translateY(30px);
    transform: translateY(30px);
  }
}
@keyframes line {
  5%,
  10% {
    -webkit-transform: translateY(-30px);
    transform: translateY(-30px);
  }
  40% {
    -webkit-transform: translateY(-20px);
    transform: translateY(-20px);
  }
  65% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  75%,
  100% {
    -webkit-transform: translateY(30px);
    transform: translateY(30px);
  }
}
@-webkit-keyframes svg {
  0%,
  20% {
    stroke-dasharray: 0;
    stroke-dashoffset: 0;
  }
  21%,
  89% {
    stroke-dasharray: 20px;
    stroke-dashoffset: 26px;
    stroke-width: 3px;
    margin: -10px 0 0 -10px;
    stroke: var(--checkmark);
  }
  100% {
    stroke-dasharray: 100px;
    stroke-dashoffset: 0;
    margin: -10px 0 0 -10px;
    stroke: var(--checkmark);
  }
  12% {
    opacity: 1;
  }
  20%,
  89% {
    opacity: 0;
  }
  90%,
  100% {
    opacity: 1;
  }
}
@keyframes svg {
  0%,
  20% {
    stroke-dasharray: 0;
    stroke-dashoffset: 0;
  }
  21%,
  89% {
    stroke-dasharray: 20px;
    stroke-dashoffset: 26px;
    stroke-width: 3px;
    margin: -10px 0 0 -10px;
    stroke: var(--checkmark);
  }
  100% {
    stroke-dasharray: 100px;
    stroke-dashoffset: 0;
    margin: -10px 0 0 -10px;
    stroke: var(--checkmark);
  }
  12% {
    opacity: 1;
  }
  20%,
  89% {
    opacity: 0;
  }
  90%,
  100% {
    opacity: 1;
  }
}
@-webkit-keyframes background {
  10% {
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
  }
  40% {
    -webkit-transform: scaleY(0.15);
    transform: scaleY(0.15);
  }
  65% {
    -webkit-transform: scaleY(0.5);
    transform: scaleY(0.5);
    border-radius: 0 0 50% 50%;
  }
  75% {
    border-radius: 0 0 50% 50%;
  }
  90%,
  100% {
    border-radius: 0;
  }
  75%,
  100% {
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
  }
}
@keyframes background {
  10% {
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
  }
  40% {
    -webkit-transform: scaleY(0.15);
    transform: scaleY(0.15);
  }
  65% {
    -webkit-transform: scaleY(0.5);
    transform: scaleY(0.5);
    border-radius: 0 0 50% 50%;
  }
  75% {
    border-radius: 0 0 50% 50%;
  }
  90%,
  100% {
    border-radius: 0;
  }
  75%,
  100% {
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
  }
}
.container {
  display: -webkit-box;
  display: flex;
  flex-wrap: wrap;
  -webkit-box-pack: center;
  justify-content: center;
}
.container > div {
  flex-basis: 100%;
  width: 0;
}
</style>
