import * as BABYLON from 'babylonjs';

export default function createStairs(scene: BABYLON.Scene, level=10): BABYLON.Mesh {

    if(level<1){
        throw new Error(`level should be grater than 1`);
    }else
    if(level!==Math.floor(level)){
        throw new Error(`level should be integer`);
    }

    const material = new BABYLON.StandardMaterial("icemanmaterail", scene);
    material.diffuseColor = BABYLON.Color3.FromHexString('#777777');

    let groundBallMesh = BABYLON.Mesh.CreateBox("stair", 1, scene);
    groundBallMesh.material = material;
    groundBallMesh.scaling.z = 10;
    groundBallMesh.checkCollisions = true;
    const groundMesh = groundBallMesh;

    for(let i=0;i<level-1;i++){
        const groundBallMeshNew = BABYLON.Mesh.CreateBox(`stair${i+2}`, 1, scene);
        groundBallMeshNew.parent = groundBallMesh;
        groundBallMeshNew.material = material;
        groundBallMeshNew.position.x = 1;
        groundBallMeshNew.position.y = 0.5;
        groundBallMeshNew.checkCollisions = true;
        groundBallMesh = groundBallMeshNew;
    }

    return groundMesh;
}
