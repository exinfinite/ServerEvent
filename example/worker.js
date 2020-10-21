importScripts("./comlink@4.3.0.min.js");
async function obj(cb) {
    var es = new EventSource('event.php');
    es.addEventListener('userconnect', async function (e) {
        await cb(e.data);
    }, false);
}
Comlink.expose(obj);