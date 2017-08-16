import * as BABYLON from 'babylonjs';
import createStairs from './create-stairs';

export default function createScene(canvas: HTMLCanvasElement, engine: BABYLON.Engine, updateScore:(score:number)=>void): BABYLON.Scene {
    const scene = new BABYLON.Scene(engine);
    scene.clearColor = new BABYLON.Color4(1, 1, 1, 0);

    const camera = new BABYLON.FreeCamera("FreeCamera", new BABYLON.Vector3(-10, 2, -10), scene);
    camera.fov = 1.2;
    camera.attachControl(canvas, true);
    camera.angularSensibility = 2000;
    camera.speed = 1;
    camera.keysUp.push(87);    //W
    camera.keysDown.push(83)   //D
    camera.keysLeft.push(65);  //A
    camera.keysRight.push(68); //S

    scene.gravity = new BABYLON.Vector3(0, -0.9, 0);
    scene.collisionsEnabled = true;
    camera.checkCollisions = true;
    camera.applyGravity = true;
    camera.ellipsoid = new BABYLON.Vector3(1, 2, 1);

    const light1 = new BABYLON.DirectionalLight("dir01", new BABYLON.Vector3(-1, -2, -1), scene);
    light1.position = new BABYLON.Vector3(20, 3, 20);
    light1.intensity = 0.5;

    const light2 = new BABYLON.DirectionalLight("dir02", new BABYLON.Vector3(2, -1, -1), scene);
    light2.position = new BABYLON.Vector3(20, 3, 20);
    light2.diffuse = BABYLON.Color3.FromHexString('#ffd11b');
    light2.intensity = 0.5;

    const groundMesh = BABYLON.Mesh.CreateGround("ground", 10000, 10000, 2, scene);
    groundMesh.position.y = -0.5;
    groundMesh.checkCollisions = true;
    const groundMaterial = new BABYLON.StandardMaterial("ground-material", scene);
    groundMaterial.diffuseColor = BABYLON.Color3.FromHexString('#bbffbe');
    groundMesh.material = groundMaterial;

    const stairsMesh = createStairs(scene, 50);
    stairsMesh.position.y = -0.5;

    const building = BABYLON.Mesh.CreateBox("box", 50, scene);
    building.position.y = -0.5;
    building.position.x = 75;
    building.checkCollisions = true;


    let itemMeshes: BABYLON.Mesh[] = [];
    for (let i = 0; i < 30; i++) {
        const itemMesh = BABYLON.Mesh.CreateBox("box", 1, scene);
        const material = new BABYLON.StandardMaterial("icemanmaterail", scene);
        material.diffuseTexture = new BABYLON.Texture("/assets/textures/square-200-eleph.png", scene);
        material.diffuseTexture.hasAlpha = true;
        material.backFaceCulling = false;
        itemMesh.material = material;
        itemMesh.position.x = building.position.x + (Math.random() - 0.5) * 50;
        itemMesh.position.z = building.position.z + (Math.random() - 0.5) * 50;
        itemMesh.position.y = 25.0001;
        itemMesh.rotation.y = Math.random() * Math.PI * 2;
        itemMesh.checkCollisions = true;
        itemMeshes.push(itemMesh);
    }

    const startTime = (new Date()).getTime();
    function update() {

        const nowtTime = (new Date()).getTime();
        const duration = nowtTime - startTime;

        itemMeshes.forEach((mesh) => {
            mesh.rotation.y = Math.PI * 2 * (1 / 1000) * duration;
        });

        requestAnimationFrame(update);
    }
    requestAnimationFrame(update);


    let score = 0;
    camera.onCollide = function (collidedMesh: any) {

        if (itemMeshes.indexOf(collidedMesh) !== -1) {
            score++;
            updateScore(score);
            collidedMesh.dispose();
        }
    };

    return scene;
}
