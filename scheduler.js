let child = require("child_process");
const killed = () => {
  process.stdout.write(`\nStopping docker container... `);
  child.exec(`bash stop.sh`, (e, stdout) => {
    if (e) throw e;

    console.log("OK!");
    process.exit(0);
  });
  setTimeout(() => {
    console.log("Hmmm, something went wrong");
    process.exit(1);
  }, 1234);
};
const dir = "./www/";
let oldList;
let newList;

process.title = "Apache/PHP scheduler";
child.title = "Apache/PHP scheduler – child";

process.on("SIGINT", killed); // CTRL+C
process.on("SIGQUIT", killed); // Keyboard quit
process.on("SIGTERM", killed); // `kill` command

process.stdout.write(`Running Docker stuff...\n`);
child.exec(`bash run.sh`, (e, stdout) => {
  if (e) throw e;

  console.log(stdout);

  process.stdout.write(
    `Looking at ${dir} and subfolders for changes... (stop with Ctrl+C)\n`
  );

  setInterval(() => {
    child.exec("ls -laR " + dir, (e, stdout, _err) => {
      if (e) throw e;

      newList = stdout;
    });
  }, 1000);

  setInterval(() => {
    if (oldList && newList !== oldList) {
      process.stdout.write(`Reloading...  `);

      child.exec(`bash r.sh`);
    }

    oldList = newList;
  }, 100);
});
