import webpack from "webpack-stream";

export const js = () => {
  return app.gulp
    .src(app.path.src.js, { sourcemaps: true })
    .pipe(
      app.plagin.plumber(
        app.plagin.notify.onError({
          title: "JS",
          message: "Error:<%= error.message %>",
        })
      )
    )
    .pipe(
      webpack({
        mode: "development",
        output: {
          filename: "main.min.js",
        },
      })
    )
    .pipe(app.gulp.dest(app.path.build.js))
    .pipe(app.plagin.browserSync.stream());
};
