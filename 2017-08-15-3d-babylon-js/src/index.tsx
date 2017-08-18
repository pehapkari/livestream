import './index.css';
import * as BABYLON from 'babylonjs';
import createScene from './scene/create-scene';
import registerServiceWorker from './registerServiceWorker';
registerServiceWorker();

const canvasElement = document.getElementById("scene") as any;
const scoreElement = document.getElementById("score") as HTMLDivElement;
function updateScore(score:number){
    scoreElement.innerText = score.toString();
}

canvasElement.onclick = function() {
    canvasElement.requestPointerLock();
}

const engine = new BABYLON.Engine(canvasElement, true);
const scene = createScene(canvasElement, engine, updateScore);

engine.runRenderLoop(function () {
    scene.render();
});

window.addEventListener("resize", function () {
    engine.resize();
});
