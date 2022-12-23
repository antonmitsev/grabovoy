let child = require("child_process");
const dir = "./www/html/";
let oldList;
let newList;

process.title = "Apache/PHP scheduler";
child.title = "Apache/PHP scheduler – child";

process.stdout.write(`Running Docker stuff...\n`);
child.exec(`bash run.sh`, (e, stdout) => {
  if (e) throw e;

  console.log(stdout);

  process.stdout.write(`Looking at ${dir} for changes... (stop with Ctrl+C)\n`);

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
