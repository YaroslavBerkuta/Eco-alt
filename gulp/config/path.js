import * as nodePath from "path";
const rootFoulder = nodePath.basename(nodePath.resolve());

const buildFoulder = `./docs`;
const srcFoulder = `./src`;

export const path = {
  build: {
    img: `${buildFoulder}/img/`,
    js: `${buildFoulder}/js/`,
    css: `${buildFoulder}/css/`,
    html: `${buildFoulder}/`,
    files: `${buildFoulder}/files/`,
  },
  src: {
    img: `${srcFoulder}/img/*.*`,
    svg: `${srcFoulder}/img/*.svg`,
    js: `${srcFoulder}/js/main.js`,
    scss: `${srcFoulder}/scss/style.scss`,
    html: `${srcFoulder}/*.html`, //pug
    files: `${srcFoulder}/files/**/*.*`,
  },
  watch: {
    img: `${srcFoulder}/img/**/*.*`,
    js: `${srcFoulder}/js/**/*.js`,
    scss: `${srcFoulder}/scss/**/*.scss`,
    html: `${srcFoulder}/**/*.html`, //pug
    files: `${srcFoulder}/files/**/*.*`,
  },
  clean: buildFoulder,
  buildFoulder: buildFoulder,
  srcFoulder: srcFoulder,
  rootFoulder: rootFoulder,
  ftp: ``,
};
