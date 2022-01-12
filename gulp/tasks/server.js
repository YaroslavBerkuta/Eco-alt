export const server = (done) => {
  app.plagin.browserSync.init({
    server: {
      baseDir: `${app.path.build.html}`,
    },
    notify: false,
    port: 3000,
  });
};
