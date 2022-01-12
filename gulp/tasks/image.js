import webp from "gulp-webp";
import imagemin from "gulp-imagemin";

export const image = () => {
  return app.gulp
    .src(app.path.src.img)
    .pipe(
      app.plagin.plumber(
        app.plagin.notify.onError({
          title: "IMAGE",
          message: "Error:<%= error.message %>",
        })
      )
    )
    .pipe(app.plagin.newer(app.path.build.img))
    .pipe(app.gulp.src(app.path.src.img))
    .pipe(
      imagemin({
        quality: 75,
        progressive: true,
        svgoPlugins: [{ removeViewBox: false }],
        interlaced: true,
        optimizationLevel: 5,
      })
    )
    .pipe(app.gulp.dest(app.path.build.img))
    .pipe(app.gulp.src(app.path.src.svg))
    .pipe(app.gulp.dest(app.path.build.img))
    .pipe(app.plagin.browserSync.stream());
};
