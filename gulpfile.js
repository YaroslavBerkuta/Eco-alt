import gulp from "gulp";

import { path } from "./gulp/config/path.js";
import { copy } from "./gulp/tasks/copy.js";
import { reset } from "./gulp/tasks/reset.js";
import { html } from "./gulp/tasks/html.js";
import { plagin } from "./gulp/config/plugin.js";
import { server } from "./gulp/tasks/server.js";
import { scss } from "./gulp/tasks/scss.js";
import { js } from "./gulp/tasks/js.js";
import { image } from "./gulp/tasks/image.js";

global.app = {
  path: path,
  gulp: gulp,
  plagin: plagin,
};

function watch() {
  gulp.watch(path.watch.files, copy);
  gulp.watch(path.watch.html, html);
  gulp.watch(path.watch.scss, scss);
  gulp.watch(path.watch.js, js);
  gulp.watch(path.watch.img, image);
}

const mainTasks = gulp.parallel(copy, html, scss, js, image);

const dev = gulp.series(reset, mainTasks, gulp.parallel(watch, server));

gulp.task("default", dev);
