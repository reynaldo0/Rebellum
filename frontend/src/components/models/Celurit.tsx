import React from 'react';
import { useGLTF } from '@react-three/drei';
import { GroupProps } from '@react-three/fiber';
import * as THREE from 'three';
import { GLTF } from 'three/examples/jsm/Addons.js';

type GLTFResult = GLTF & {
    nodes: {
        Object_4: THREE.Mesh;
    };
    materials: {
        Material: THREE.Material;
    };
};

const Celurit: React.FC<GroupProps> = (props) => {
    const { nodes, materials } = useGLTF('/3D/celurit.glb') as unknown as GLTFResult;

    return (
        <group {...props} dispose={null}>
            <group rotation={[-Math.PI / 2, 0, 0]}>
                <mesh
                    position={[0, 0, 0]}
                    geometry={nodes.Object_4.geometry}
                    material={materials.Material}
                    scale={0.053}
                />
            </group>
        </group>
    );
};

useGLTF.preload('/3D/celurit.glb');

export default Celurit;