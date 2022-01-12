import fileInclude from "gulp-file-include";
import webpHtmlNoSvg from "gulp-webp-html-nosvg";
import versionNumber from "gulp-version-number";
import pug from "gulp-pug";

export const html = () => {
  return (
    app.gulp
      .src(app.path.src.html)
      .pipe(
        app.plagin.plumber(
          app.plagin.notify.onError({
            title: "HTML",
            message: "Error:<%= error.message %>",
          })
        )
      )
      .pipe(fileInclude())

      // Підключення PUG

      /*.pipe(
      pug({
        pretty: false,
        verbose: true,
      })
    )*/

      .pipe(app.plagin.replace(/@img\//g, "img/"))
      .pipe(
        versionNumber({
          value: "%DT%",
          append: { key: "_v", cover: 0, to: ["css", "js"] },
          output: {
            file: "gulp/version.json",
          },
        })
      )

      .pipe(app.gulp.dest(app.path.build.html))
      .pipe(app.plagin.browserSync.stream())
  );
};
